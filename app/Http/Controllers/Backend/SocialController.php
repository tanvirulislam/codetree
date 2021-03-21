<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Social;
use Illuminate\Support\Str;
class SocialController extends Controller
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
        if (is_null($this->user) || !$this->user->can('social.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Social !');
        }
        
        
        $choose =Social::latest()->get();
        return view('backend.social.index', compact('choose'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (is_null($this->user) || !$this->user->can('social.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any social !');
        }
        
       
        return view('backend.social.create');
    }


    public function store(Request $request)
    {
    $request->validate([
        
        'Icon'=>'required',
        'title'=>'required',
        'link'=>'required',
            
       
    ]);
   
   
    $product=new Social;
    $product->title=$request->title;
    $product->Icon=$request->Icon;
    $product->link = $request->link;
    $product->save();

    
        Toastr::success('Product Added Successfully.');
        return redirect()->route('admin.social');
   

    }


    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('social.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any social !');
        }
      
        $banners=DB::table('socials')->where('id',$id)->first();
        return view('backend.social.edit')->with([
          'banners'=>$banners,
         
      ]);
    }
    //update product information
    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required'
            
        ]);
      
     
         $product=Social::find($request->id);
    
    $product->title=$request->title;
    $product->Icon=$request->Icon;
    $product->link = $request->link;
    $product->save();
         
         Toastr::success('  Updated Successfully.');
         return redirect()->route('admin.social');
     

    }


    



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('social.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Feature !');
        }
         Social::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
