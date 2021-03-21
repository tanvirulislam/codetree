<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Feature;
use Illuminate\Support\Str;
class FeatureController extends Controller
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
        if (is_null($this->user) || !$this->user->can('feature.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Choose !');
        }
        
        
        $choose =Feature::latest()->get();
        return view('backend.feature.index', compact('choose'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (is_null($this->user) || !$this->user->can('feature.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any feature !');
        }
        
       
        return view('backend.feature.create');
    }


    public function store(Request $request)
    {
    $request->validate([
        'htitle'=>'required',
        'Icon'=>'required',
        'title'=>'required',
        'des'=>'required',
            
       
    ]);
   
   
    $product=new Feature;
    $product->htitle=$request->htitle;
    $product->title=$request->title;
    $product->Icon=$request->Icon;
    $product->des = $request->des;
    $product->save();

    
        Toastr::success('Product Added Successfully.');
        return redirect()->route('admin.feature');
   

    }


    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('feature.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any feature !');
        }
      
        $banners=DB::table('features')->where('id',$id)->first();
        return view('backend.feature.edit')->with([
          'banners'=>$banners,
         
      ]);
    }
    //update product information
    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required'
            
        ]);
      
     
         $product=Feature::find($request->id);
    $product->htitle=$request->htitle;
    $product->title=$request->title;
    $product->Icon=$request->Icon;
    $product->des = $request->des;
    $product->save();
         
         Toastr::success('  Updated Successfully.');
         return redirect()->route('admin.feature');
     

    }


    



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('feature.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Feature !');
        }
         Feature::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
