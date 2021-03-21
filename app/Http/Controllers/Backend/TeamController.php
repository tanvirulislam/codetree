<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Team;
use Illuminate\Support\Str;
class TeamController extends Controller
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
        if (is_null($this->user) || !$this->user->can('team.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any team !');
        }
        $categories =Team::latest()->get();
        return view('backend.team.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (is_null($this->user) || !$this->user->can('team.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any team !');
        }
       
        return view('backend.team.create');
    }

     protected function imageUpload($request){
        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/team_image/';
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
    
        $client=new Team();
         
        $client->title = $request->title;
        $client->type = $request->type;
      $client->name = $request->name;
        $client->image=$image;
        
        $client->save();
        Toastr::success(' Added Successfully.');
          return redirect()->back();
       
    }


    public function edit($id){

    
    if (is_null($this->user) || !$this->user->can('team.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any team !');
        }

    $view = Team::where('id',$id)->first();
    return view('backend.team.edit',['view'=>$view]);

}
 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('news.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any news !');
        }
        $category = Team::find($request->id);
$category->title = $request->title;
        $category->type = $request->type;
      $category->name = $request->name;
       
       
      if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/team_image/',$filename);
            $category->image ='public/uploads/team_image/'.$filename;
        }

        $category->save();
       
         Toastr::success('Successfully Updated :)','Success');
        return redirect()->route('admin.team');

 }

 public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('team.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any team !');
        }
         Team::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
