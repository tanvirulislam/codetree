<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class AdminsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $admins = Admin::all();
        return view('backend.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $roles  = Role::all();
        return view('backend.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create New User
        $admins = new Admin();
        $admins->name = $request->name;
        $admins->username = Str::slug($request->name);
        $admins->email = $request->email;
        $admins->password = Hash::make($request->password);
        $admins->save();

        if ($request->roles) {
            $admins->assignRole($request->roles);
        }

        Toastr::success('Successully Added :)' ,'Success');
        return redirect()->route('admin.admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $admins = Admin::find($id);
        $roles  = Role::all();
        return view('backend.admins.edit', compact('admins', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        // Create New User
        $admins = Admin::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);


        $admins->name = $request->name;
        $admins->username = Str::slug($request->name);
        $admins->email = $request->email;
        if ($request->password) {
            $admins->password = Hash::make($request->password);
        }
        $admins->save();

        $admins->roles()->detach();
        if ($request->roles) {
            $admins->assignRole($request->roles);
        }

         Toastr::success('Successully Updated :)' ,'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $admins = Admin::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        Toastr::success('Successully Deleted :)' ,'Success');
        return back();
    }
}
