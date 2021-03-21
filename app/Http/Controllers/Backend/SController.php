<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Subcategory;
use App\Models\Service;
use Illuminate\Support\Str;
class SController extends Controller
{
   public $user;

	public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index()
    {
    	if (is_null($this->user) || !$this->user->can('service.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any porfolio !');
        }
        $categories =Subcategory::orderBy('id','asc')->limit(5)->get();
        $portfolios =Service::latest()->get();
        return view('backend.service.index',compact('categories','portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	if (is_null($this->user) || !$this->user->can('service.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any service !');
        }
       $categories =Subcategory::orderBy('id','asc')->limit(5)->get();
        return view('backend.service.create',compact('categories'));
    }

     protected function imageUpload($request){
        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/service_image/';
        $imageUrl = $directory.$imageName;
    
        Image::make($productImage)->save($imageUrl);

        return $imageUrl;
    }
    public function store(Request $request)
    {
    	$validdata=$request->validate([
    		'name' =>'required', 
    		
    	]);
       if($request->file('image')!==null){
        $image=$this->imageUpload($request);
      }else{
         $image=null;
      }
    
    	$client=new Service();
        $client->name = $request->name;
        $client->s_id = $request->s_id;
        $client->slug = Str::slug($request->name);
        $client->image=$image;
        $client->save();
        Toastr::success('New Category Added Successfully.');
          return redirect()->route('admin.service');
       
    }


    public function edit($id){

	
	if (is_null($this->user) || !$this->user->can('service.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any service !');
        }
$categories =Subcategory::orderBy('id','asc')->limit(5)->get();
    $view = Service::where('id',$id)->first();
	return view('backend.service.edit',['view'=>$view,'categories'=>$categories]);

}



 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('service.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any service !');
        }
        $category = Service::find($request->id);
        $category->name = $request->name;
        $category->s_id = $request->s_id;
        $category->slug = Str::slug($request->name);
       
       
      if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/service_image/',$filename);
            $category->image ='public/uploads/service_image/'.$filename;
        }

        $category->save();
       
         Toastr::success('Successfully Updated :)','Success');
        return redirect()->route('admin.service');

 }

 public function delete($id)
    {
    	if (is_null($this->user) || !$this->user->can('service.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any service !');
        }
         Service::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
