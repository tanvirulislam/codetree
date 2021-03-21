<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Client1;
use App\Models\Headline;
class DashboardController extends Controller
{
	public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index(){
if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }
        $portfolios = Portfolio::count();
        $services = Service::count();
        $clients = Client1::count();
        $headlines = Headline::count();
        $totalApps = Portfolio::where('cat_id','android-app')->count();
        $softwares = Portfolio::where('cat_id','software')->count();
        $webs = Portfolio::where('cat_id','web-design-development')->count();
    	return view('backend.index',['portfolios'=>$portfolios,'services'=>$services,'headlines'=>$headlines,
    	'clients'=>$clients,'totalApps'=>$totalApps,'softwares'=>$softwares,'webs'=>$webs]);
    }
}
