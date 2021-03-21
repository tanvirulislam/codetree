<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Category;
use Illuminate\Support\Str;
class PcatController extends Controller
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
    	if (is_null($this->user) || !$this->user->can('portfolio.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any porfolio !');
        }
        $categories =Category::latest()->get();
        return view('backend.pcat.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	if (is_null($this->user) || !$this->user->can('portfolio.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any porfolio !');
        }
       
        return view('backend.pcat.create');
    }

     protected function imageUpload($request){
        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/portfolio_image/';
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
    
    	$client=new Category();
        $client->name = $request->name;
        $client->status = $request->status;
        $client->slug = Str::slug($request->name);
        $client->image=$image;
        $client->save();
        Toastr::success('New Category Added Successfully.');
          return redirect()->route('admin.portfolio_category');
       
    }


    public function edit($id){

	
	if (is_null($this->user) || !$this->user->can('portfolio.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any portfolio !');
        }

    $view = Category::where('id',$id)->first();
	return view('backend.pcat.edit',['view'=>$view]);

}
 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('portfolio.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any portfolio !');
        }
        $category = Category::find($request->id);
        $category->status = $request->status;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
       
       
      if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/portfolio_image/',$filename);
            $category->image ='public/uploads/portfolio_image/'.$filename;
        }

        $category->save();
       
         Toastr::success('Successfully Updated :)','Success');
        return redirect()->route('admin.portfolio_category');

 }

 public function delete($id)
    {
    	if (is_null($this->user) || !$this->user->can('portfolio.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any portfolio !');
        }
         Category::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
