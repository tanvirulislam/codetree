<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Headline;
use Illuminate\Support\Str;
class NewsController extends Controller
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
    	if (is_null($this->user) || !$this->user->can('news.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any news !');
        }
        $categories =Headline::latest()->get();
        return view('backend.news.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	if (is_null($this->user) || !$this->user->can('news.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any news !');
        }
       
        return view('backend.news.create');
    }

     protected function imageUpload($request){
        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/news_image/';
        $imageUrl = $directory.$imageName;
    
        Image::make($productImage)->save($imageUrl);

        return $imageUrl;
    }
    public function store(Request $request)
    {
    	$validdata=$request->validate([
    		'title' =>'required', 
    		
    	]);
       if($request->file('image')!==null){
        $image=$this->imageUpload($request);
      }else{
         $image=null;
      }
    
    	$client=new Headline();
    	 
        $client->title = $request->title;
        $client->des = $request->des;
      
        $client->image=$image;
    	
        $client->save();
        Toastr::success(' Added Successfully.');
          return redirect()->route('admin.news');
       
    }


    public function edit($id){

	
	if (is_null($this->user) || !$this->user->can('news.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any news !');
        }

    $view = Headline::where('id',$id)->first();
	return view('backend.news.edit',['view'=>$view]);

}
 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('news.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any news !');
        }
        $category = Headline::find($request->id);

        $category->title = $request->title;
        $category->des = $request->des;
       
       
      if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/news_image/',$filename);
            $category->image ='public/uploads/news_image/'.$filename;
        }

        $category->save();
       
         Toastr::success('Successfully Updated :)','Success');
        return redirect()->route('admin.news');

 }

 public function delete($id)
    {
    	if (is_null($this->user) || !$this->user->can('news.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any news !');
        }
         Headline::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
