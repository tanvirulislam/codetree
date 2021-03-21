<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\S_link;
use App\Models\Team;
use Illuminate\Support\Str;
class SocialtController extends Controller
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
        $categories =S_link::latest()->get();
        $teams = Team::where('type',0)->get();
        return view('backend.slink.index', compact('categories','teams'));
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
       $teams = Team::where('type',0)->get();
        return view('backend.slink.create', compact('teams'));
    }

    
    public function store(Request $request)
    {
        $validdata=$request->validate([
            'user_name' =>'required', 
            
        ]);
      
    
            $slink = new S_link();
        $slink->user_name = $request->user_name;
        $slink->f_link = $request->f_link;
        $slink->ins_link = $request->ins_link;
        $slink->linkin_link = $request->linkin_link;
        $slink->git_link = $request->git_link;
        $slink->you_link = $request->you_link;
        $slink->pin_link = $request->pin_link;
        $slink->save();
        Toastr::success(' Added Successfully.');
          return redirect()->back();
       
    }


    public function edit($id){

    
    if (is_null($this->user) || !$this->user->can('team.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any team !');
        }
  $teams = Team::all();
    $social = S_link::where('id',$id)->first();
    return view('backend.slink.edit',['social'=>$social,'teams'=>$teams]);

}
 public function update(Request $request){
 if (is_null($this->user) || !$this->user->can('team.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any news !');
        }
        $slink = S_link::find($request->id);
        $slink->user_name = $request->user_name;
        $slink->f_link = $request->f_link;
        $slink->ins_link = $request->ins_link;
        $slink->linkin_link = $request->linkin_link;
        $slink->git_link = $request->git_link;
        $slink->you_link = $request->you_link;
        $slink->pin_link = $request->pin_link;
        $slink->save();
       
         Toastr::success('Successfully Updated :)','Success');
        return redirect()->route('admin.team_social_link');

 }

 public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('team.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any team !');
        }
         S_link::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
