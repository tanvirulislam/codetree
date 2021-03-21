<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Subcategory;
use App\Models\Banner;
use App\Models\Choose;
use App\Models\Feature;
use App\Models\Social;
use App\Models\Clientlogo;
use App\Models\Client1;
use App\Models\Headline;
use App\Models\Address;
use App\Models\Service;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\About;
use App\Models\S_link;
use App\Models\Team;
use App\Models\User;
use App\Models\Customer;

class PaymentController extends Controller
{
    public function create_order_info(){

        $icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();

        return view('front.payment.order_info',  compact('icons', 'logos', 'software', 'services', 'addresses', 'socials'));

    }

    public function store_order_info(Request $request){
        // dd($request);
        $customer = new Customer();
        $customer->name = $request->name ;
        $customer->email = $request->email ;
        $customer->mobile = $request->mobile ;
        $customer->company = $request->company ;
        $customer->address = $request->address ;
        $customer->price = $request->price ;
        $customer->bandwidth = $request->bandwidth ;
        $customer->save();
        return redirect()->back();

    }
}
