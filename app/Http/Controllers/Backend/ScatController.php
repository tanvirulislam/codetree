<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Subcategory;
use Illuminate\Support\Str;
class ScatController extends Controller
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
    	if (is_null($this->user) || !$this->user->can('service.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any service !');
        }
        $categories =Subcategory::latest()->get();
        return view('backend.scat.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	if (is_null($this->user) || !$this->user->can('service.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any service !');
        }
       
        return view('backend.scat.create');
    }

    
    public function store(Request $request)
    {
    	$validdata=$request->validate([
    		'name' =>'required', 
    		
    	]);
      
    
    	$client=new Subcategory();
        $client->name = $request->name;
        $client->status = $request->status;
        $client->slug = Str::slug($request->name);
        
        $client->save();
        Toastr::success('New Category Added Successfully.');
          return redirect()->route('admin.service_category');
       
    }


    public function edit($id){

	
	if (is_null($this->user) || !$this->user->can('service.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any service !');
        }

    $view = Subcategory::where('id',$id)->first();
	return view('backend.scat.edit',['view'=>$view]);

}
 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('service.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any service !');
        }
        $category = Subcategory::find($request->id);
        $category->status = $request->status;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
   
        $category->save();
       
         Toastr::success('Successfully Updated :)','Success');
        return redirect()->route('admin.service_category');

 }

 public function delete($id)
    {
    	if (is_null($this->user) || !$this->user->can('service.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any service !');
        }
         Subcategory::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
