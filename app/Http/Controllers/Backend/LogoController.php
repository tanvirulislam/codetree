<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Logo;
use Illuminate\Support\Str;
class LogoController extends Controller
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
    	if (is_null($this->user) || !$this->user->can('logo.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Logo !');
        }
        
        
        $logos =Logo::latest()->get();
        return view('backend.logo.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	if (is_null($this->user) || !$this->user->can('logo.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any Logo !');
        }
        
       
        return view('backend.logo.create');
    }


    protected function imageUpload($request){
        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/logo_image/';
        $imageUrl = $directory.$imageName;
    
        Image::make($productImage)->save($imageUrl);

        return $imageUrl;
    }
    public function store(Request $request)
    {
    $request->validate([
        'name'=>'required|unique:logos',
       
    ]);
   
   if($request->file('image')!==null){
        $image=$this->imageUpload($request);
      }else{
         $image=null;
      }
    $product=new Logo;
    $product->name=$request->name;
    $product->slug=Str::slug($request->name);
    $product->status=$request->status;
    $product->image = $image;
    $product->save();

    
        Toastr::success('Product Added Successfully.');
        return redirect()->route('admin.logo');
   

    }


    public function edit(Request $request)
    {

    	if (is_null($this->user) || !$this->user->can('logo.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Logo !');
        }
      
        $logos=DB::table('logos')->where('id',$request->productid)->first();
        return view('backend.logo.edit')->with([
          'logos'=>$logos,
         
      ]);
    }
    //update product information
    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required'
            
        ]);
        if($request->file('image')!==null){
        $image=$this->imageUpload($request);
      }else{
         $image=DB::table('logos')->where('id',$request->id)->value('image');
      }
     
         DB::table('logos')->where('id',$request->id)
         ->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>$image,
            
          
         ]);

         
         Toastr::success('Product  Updated Successfully.');
         return redirect()->back();
     

    }


    



    public function delete($id)
    {
    	if (is_null($this->user) || !$this->user->can('logo.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Logo !');
        }
         Logo::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
