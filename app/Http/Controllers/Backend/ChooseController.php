<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Choose;
use Illuminate\Support\Str;
class ChooseController extends Controller
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
        if (is_null($this->user) || !$this->user->can('choose.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Choose !');
        }
        
        
        $choose =Choose::latest()->get();
        return view('backend.choose.index', compact('choose'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (is_null($this->user) || !$this->user->can('choose.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any Logo !');
        }
        
       
        return view('backend.choose.create');
    }


    public function store(Request $request)
    {
    $request->validate([
        'htitle'=>'required',
        'Icon'=>'required',
        'title'=>'required',
        'des'=>'required',
            
       
    ]);
   
   
    $product=new Choose;
    $product->htitle=$request->htitle;
    $product->title=$request->title;
    $product->Icon=$request->Icon;
    $product->des = $request->des;
    $product->save();

    
        Toastr::success('Product Added Successfully.');
        return redirect()->route('admin.choose');
   

    }


    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('choose.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Banner !');
        }
      
        $banners=DB::table('chooses')->where('id',$id)->first();
        return view('backend.choose.edit')->with([
          'banners'=>$banners,
         
      ]);
    }
    //update product information
    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required'
            
        ]);
      
     
         $product=Choose::find($request->id);
    $product->htitle=$request->htitle;
    $product->title=$request->title;
    $product->Icon=$request->Icon;
    $product->des = $request->des;
    $product->save();
         
         Toastr::success('  Updated Successfully.');
         return redirect()->route('admin.choose');
     

    }


    



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('choose.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Banner !');
        }
         Choose::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
