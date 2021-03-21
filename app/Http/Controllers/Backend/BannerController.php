<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Banner;
use Illuminate\Support\Str;
class BannerController extends Controller
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
        if (is_null($this->user) || !$this->user->can('banner.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Banner !');
        }
        
        
        $banners =Banner::latest()->get();
        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (is_null($this->user) || !$this->user->can('banner.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any Banner !');
        }
        
       
        return view('backend.banner.create');
    }


    
    public function store(Request $request)
    {
    $request->validate([
        'btitle'=>'required',
        'title'=>'required',
        'link'=>'required',
        'des'=>'required',
            
       
    ]);
   
   
    $product=new Banner;
    $product->btitle=$request->btitle;
    $product->title=$request->title;
    $product->link=$request->link;
    $product->des = $request->des;
    $product->save();

    
        Toastr::success('Product Added Successfully.');
        return redirect()->route('admin.banner');
   

    }


    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('banner.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Banner !');
        }
      
        $banners=DB::table('banners')->where('id',$id)->first();
        return view('backend.banner.edit')->with([
          'banners'=>$banners,
         
      ]);
    }
    //update product information
    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required'
            
        ]);
      
     
         DB::table('banners')->where('id',$request->id)
         ->update([
            'btitle'=>$request->btitle,
            'title'=>$request->title,
           'link'=>$request->link,
           'des'=>$request->des,
            
          
         ]);

         
         Toastr::success('  Updated Successfully.');
         return redirect()->route('admin.banner');
     

    }


    



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('banner.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Banner !');
        }
         Banner::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
