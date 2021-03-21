<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Client1;
use Illuminate\Support\Str;
class ReviewController extends Controller
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
    	if (is_null($this->user) || !$this->user->can('review.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any review !');
        }
        $categories =Client1::latest()->get();
        return view('backend.review.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	if (is_null($this->user) || !$this->user->can('review.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any review !');
        }
       
        return view('backend.review.create');
    }

     protected function imageUpload($request){
        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/client_image/';
        $imageUrl = $directory.$imageName;
    
        Image::make($productImage)->resize(960,540)->save($imageUrl);

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
    
    	$client=new Client1();
    	 $client->name = $request->name;
        $client->title = $request->title;
        $client->com = $request->com;
        $client->link = $request->link;
        $client->c_name = $request->c_name;
        $client->image=$image;
    	
        $client->save();
        Toastr::success('New Category Added Successfully.');
          return redirect()->route('admin.review');
       
    }


    public function edit($id){

	
	if (is_null($this->user) || !$this->user->can('review.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any review !');
        }

    $view = Client1::where('id',$id)->first();
	return view('backend.review.edit',['view'=>$view]);

}
 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('review.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any review !');
        }
        $category = Client1::find($request->id);

        $category->name = $request->name;
        $category->title = $request->title;
        $category->com = $request->com;
        $category->link = $request->link;
        $category->c_name = $request->c_name;
       
      if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/client_image/',$filename);
            $category->image ='public/uploads/client_image/'.$filename;
        }

        $category->save();
       
         Toastr::success('Successfully Updated :)','Success');
        return redirect()->route('admin.review');

 }

 public function delete($id)
    {
    	if (is_null($this->user) || !$this->user->can('review.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any review !');
        }
         Client1::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
