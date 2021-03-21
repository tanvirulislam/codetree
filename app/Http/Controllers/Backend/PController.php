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
use App\Models\Portfolio;
use Illuminate\Support\Str;
class PController extends Controller
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
        $portfolios =Portfolio::latest()->get();
        return view('backend.portfolio.index',compact('categories','portfolios'));
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
       $categories =Category::latest()->get();
        return view('backend.portfolio.create',compact('categories'));
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
    
    	$client=new Portfolio();
        $client->name = $request->name;
        $client->title = $request->title;
        $client->des = $request->des;
        $client->c_name = $request->c_name;
        $client->cat_id = $request->cat_id;
        $client->link = $request->link;
        $client->slug = Str::slug($request->name);
        $client->image=$image;
        $client->save();
        Toastr::success('New Category Added Successfully.');
          return redirect()->route('admin.portfolio');
       
    }


    public function edit($id){

	
	if (is_null($this->user) || !$this->user->can('portfolio.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any portfolio !');
        }
$categories =Category::latest()->get();
    $view = Portfolio::where('id',$id)->first();
	return view('backend.portfolio.edit',['view'=>$view,'categories'=>$categories]);

}

public function view($id){

	
	if (is_null($this->user) || !$this->user->can('portfolio.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any portfolio !');
        }
$categories =Category::latest()->get();
    $view = Portfolio::where('id',$id)->first();
	return view('backend.portfolio.view',['view'=>$view,'categories'=>$categories]);

}

 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('portfolio.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any portfolio !');
        }
        $category = Portfolio::find($request->id);
       $category->name = $request->name;
        $category->title = $request->title;
        $category->des = $request->des;
        $category->c_name = $request->c_name;
        $category->cat_id = $request->cat_id;
        $category->link = $request->link;
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
        return redirect()->route('admin.portfolio');

 }

 public function delete($id)
    {
    	if (is_null($this->user) || !$this->user->can('portfolio.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any portfolio !');
        }
         Portfolio::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
