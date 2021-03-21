<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Address;
use Illuminate\Support\Str;
class AddressController extends Controller
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
        if (is_null($this->user) || !$this->user->can('address.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Address !');
        }
        
        
        $choose =Address::latest()->get();
        return view('backend.address.index', compact('choose'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (is_null($this->user) || !$this->user->can('address.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any address !');
        }
        
       
        return view('backend.address.create');
    }


    public function store(Request $request)
    {
    $request->validate([
        
        'title'=>'required',
        'des'=>'required',
        'email'=>'required',
            
       
    ]);
   
   
    $product=new Address;
    $product->title=$request->title;
    $product->des=$request->des;
    $product->email = $request->email;
    $product->phone = $request->phone;
    $product->add = $request->add;
    $product->loaction = $request->loaction;
    $product->term = $request->term;
    $product->locationlink = $request->locationlink;
    $product->save();

    
        Toastr::success('Product Added Successfully.');
        return redirect()->route('admin.address');
   

    }


    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('address.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any address !');
        }
      
        $adds=DB::table('addresses')->where('id',$id)->first();
        return view('backend.address.edit')->with([
          'adds'=>$adds,
         
      ]);
    }
    //update product information
    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required'
            
        ]);
      
     
         $product=Address::find($request->id);
    $product->title=$request->title;
    $product->des=$request->des;
    $product->email = $request->email;
    $product->phone = $request->phone;
    $product->add = $request->add;
    $product->loaction = $request->loaction;
    $product->term = $request->term;
    $product->locationlink = $request->locationlink;
    $product->save();
         
         Toastr::success('  Updated Successfully.');
         return redirect()->route('admin.address');
     

    }


    



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('address.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Feature !');
        }
         Address::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
