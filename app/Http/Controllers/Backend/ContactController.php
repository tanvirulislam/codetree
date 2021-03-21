<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Contact;
use Illuminate\Support\Str;
class ContactController extends Controller
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
        if (is_null($this->user) || !$this->user->can('contact.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any contact !');
        }
        
        
        $choose =Contact::latest()->get();
        return view('backend.contact.index', compact('choose'));
    }


     public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('contact.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any contact !');
        }
         Contact::where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }
}
