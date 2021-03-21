<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Clientlogo;
use Illuminate\Support\Str;
class ClientlogoController extends Controller
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
        if (is_null($this->user) || !$this->user->can('client.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any client !');
        }
        $categories =Clientlogo::latest()->get();
        return view('backend.client.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (is_null($this->user) || !$this->user->can('client.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any client !');
        }
       
        return view('backend.client.create');
    }

     protected function imageUpload($request){
        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/client_logo/';
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
    
        $category=new Clientlogo;
        $category->name=$request->name;
        $category->image=$image;
        $category->save();
        Toastr::success('New Category Added Successfully.');
          return redirect()->route('admin.client_logo');
       
    }


    public function edit($id){

    
    if (is_null($this->user) || !$this->user->can('client.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }

    $view = Clientlogo::where('id',$id)->first();
    return view('backend.client.edit',['view'=>$view]);

}
 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }
        $category = Clientlogo::find($request->id);

        $category->name=$request->name;
       
       
      if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/uploads/client_logo/',$filename);
            $category->image ='public/uploads/client_logo/'.$filename;
        }

        $category->save();
       
         Toastr::success('Successfully Updated :)','Success');
        return redirect()->route('admin.client_logo');

 }

 public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('client.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any client !');
        }
         Clientlogo::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
