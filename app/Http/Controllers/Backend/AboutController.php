<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\About;
use Illuminate\Support\Str;

class AboutController extends Controller
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
    	if (is_null($this->user) || !$this->user->can('about.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any about !');
        }
        $categories =About::latest()->get();
        return view('backend.about.index', compact('categories'));
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
       
        return view('backend.about.create');
    }

   
    public function store(Request $request)
    {
    	$validdata=$request->validate([
    		'des' =>'required', 
    		
    	]);
      
    
    	$category = new About();
        $category->des = $request->des;
       
       
      if($request->hasfile('video_one')){
            $file = $request->file('video_one');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/about_file/',$filename);
            $category->video_one ='public/uploads/about_file/'.$filename;
        }

        if($request->hasfile('video_two')){
            $file = $request->file('video_two');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/about_file/',$filename);
            $category->video_two ='public/uploads/about_file/'.$filename;
        }

        $category->save();


        Toastr::success(' Added Successfully.');
          return redirect()->route('admin.about');
       
    }


    public function edit($id){

	
	if (is_null($this->user) || !$this->user->can('about.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any about !');
        }

    $view = About::where('id',$id)->first();
	return view('backend.about.edit',['view'=>$view]);

}
 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('news.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any news !');
        }
        $category = About::find($request->id);

        $category->des = $request->des;
       
       
      if($request->hasfile('video_one')){
            $file = $request->file('video_one');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/about_file/',$filename);
            $category->video_one ='public/uploads/about_file/'.$filename;
        }

        if($request->hasfile('video_two')){
            $file = $request->file('video_two');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/about_file/',$filename);
            $category->video_two ='public/uploads/about_file/'.$filename;
        }

        $category->save();
       
         Toastr::success('Successfully Updated :)','Success');
        return redirect()->route('admin.about');

 }

 public function delete($id)
    {
    	if (is_null($this->user) || !$this->user->can('news.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any news !');
        }
         About::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
