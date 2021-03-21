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
class CategoryController extends Controller
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
    	if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }
        $categories =Category::latest()->get();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any category !');
        }
       
        return view('backend.category.create');
    }

     protected function imageUpload($request){
        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/category_image/';
        $imageUrl = $directory.$imageName;
    
        Image::make($productImage)->resize( 80,80)->save($imageUrl);

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
    
    	$category=new Category;
    	$category->name=$request->name;
    	$category->code='CC-'.rand('1000','9999');
    	$category->description=$request->description;
        $category->image=$image;
    	$category->slug=Str::slug($request->name);
        $category->save();
        Toastr::success('New Category Added Successfully.');
          return redirect()->route('admin.category');
       
    }


    public function edit($id){

	
	if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }

    $view = Category::where('id',$id)->first();
	return view('backend.category.edit',['view'=>$view]);

}
 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }
        $category = Category::find($request->id);

        $category->name=$request->name;
        $category->description=$request->description;
        $category->slug=Str::slug($request->name);
       
      if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/category_image/',$filename);
            $category->image ='public/uploads/category_image/'.$filename;
        }

        $category->save();
       
         Toastr::success('Successfully Updated :)','Success');
        return redirect()->route('admin.category');

 }

 public function delete($id)
    {
    	if (is_null($this->user) || !$this->user->can('category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any category !');
        }
         Category::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
