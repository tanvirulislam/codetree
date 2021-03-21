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
use App\Models\DemoRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailNotify;


class MainController extends Controller
{
    public function redirectAdmin()
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	//every page
       $banners = Banner::all();
       $chooses = Choose::all();
       $chooseTitle = Choose::distinct()->select('htitle')->get();
       $features = Feature::all();
       $featureTitle = Feature::distinct()->select('htitle')->get();
       $socials = Social::all();
       $firstSection = Clientlogo::latest()->limit(12)->get();
       //dd($firstSection);
       $secondSection = Clientlogo::latest()->skip(12)->take(12)->get();
       $thirdSection = Clientlogo::latest()->skip(24)->take(12)->get();

       $clients = Client1::all();
       $news =Headline::latest()->limit(4)->get();

       return view('front.index',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'banners'=>$banners,'chooses'=>$chooses,'chooseTitle'=>$chooseTitle,'features'=>$features,'featureTitle'=>$featureTitle,'socials'=>$socials,'firstSection'=>$firstSection,'secondSection'=>$secondSection,'thirdSection'=>$thirdSection,'clients'=>$clients,'news'=>$news,'addresses'=>$addresses]);
    }

    public function Pos_Inventory()
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
      

       return view('front.Pos_Inventory',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses]);
    }


    public function school_management()
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
      

       return view('front.school_management',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses]);
    }



     public function service($slug)
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
        $servicesnew = Service::where('s_id',$slug)->get();
        $scat = Subcategory::where('slug',$slug)->value('name');
       return view('front.service',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses,'servicesnew'=>$servicesnew,'scat'=>$scat]);
    }



    public function bulk_sms()
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
      

       return view('front.bulk-sms',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses]);
    }


    public function hosting()
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
      

       return view('front.hosting',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses]);
    }



     public function portfolio()
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
       $categories = Category::all();

       return view('front.portfolio',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses,'categories'=>$categories]);
    }

    public function portfoliodetail($slug)
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
       $categories = Category::all();


       $portfolios =Portfolio::where('cat_id',$slug)->get();
       $portfolioscat =Category::where('slug',$slug)->value('name');


       return view('front.portfoliodetail',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses,'categories'=>$categories,'portfolios'=>$portfolios,'portfolios'=>$portfolios,'portfolioscat'=>$portfolioscat]);
    }



     public function portfoliosingle($slug)
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
       $categories = Category::all();


       $portfolios =Portfolio::where('slug',$slug)->first();
       $newv =Portfolio::where('slug',$slug)->value('cat_id');
       $portfolioscat =Category::where('slug',$newv)->value('name');


       return view('front.portfoliosingle',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses,'categories'=>$categories,'portfolios'=>$portfolios,'portfolios'=>$portfolios,'portfolioscat'=>$portfolioscat]);
    }



    public function news()
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
       $news =  Headline::latest()->limit(6)->get();
       $news1 =  Headline::latest()->skip(6)->take(6)->get();
       $news2 =  Headline::latest()->skip(12)->take(6)->get();
       return view('front.news',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses,'news'=>$news,'news1'=>$news1,'news2'=>$news2]);
    }




    public function about()
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
       $news =  Headline::latest()->limit(6)->get();
       $news1 =  Headline::latest()->skip(6)->take(6)->get();
       $news2 =  Headline::latest()->skip(12)->take(6)->get();

       $abouts = About::latest()->get();

       return view('front.about',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses,'news'=>$news,'news1'=>$news1,'news2'=>$news2,'abouts'=>$abouts]);
    }




     public function team()
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
      

       $teams = Team::where('type',0)->orderBy('id','asc')->get();
       $teamsa = Team::where('type',1)->orderBy('id','asc')->get();

       $links = S_link::latest()->get();

       return view('front.team',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses,'teams'=>$teams,'teamsa'=>$teamsa,'links'=>$links]);
    }




    public function contact()
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
      

       

       return view('front.contact',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses,]);
    }


 public function viewnews($view)
    {
    	//every page
    	$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
    	//every page
      
	$newss = Headline::where('title',$view)->first();
       return view('front.single-news',['icons'=>$icons,'logos'=>$logos,'software'=>$software,'services'=>$services,'socials'=>$socials,'addresses'=>$addresses,'newss'=>$newss]);
    }

	// mizan---------
	public function request_login(Request $request){

		$validated = $request->validate([

			'phn_number' => 'required|regex:/(01)[0-9]/|not_regex:/[a-z]/|min:11',
			'request_email' => 'required|unique:demo_requests|max:255',

		]);
		
		$demo_login = new DemoRequest();
		$demo_login->request_name = $request->request_name;
		$demo_login->request_email = $request->request_email;
		$demo_login->request_profesion = $request->request_profesion;
		$demo_login->request_purpose = $request->request_purpose;
		$demo_login->request_software_name = $request->request_software_name;
		$demo_login->phn_number= $request->phn_number;
		$demo_login->save();

		$name = $request->request_name;
		$email = $request->request_email;
		$software_name = $request->request_software_name;
		$user = User::where('id', 1)->get();


		Notification::send($user, new EmailNotify($name, $email, $software_name));
		Toastr::success('Successfully send request' );
		return redirect()->back()->with('success','Request Send successfully');;

	}


	public function cloud_description(){
		$icons = Logo::where('status',0)->latest()->limit(1)->get();
    	$logos = Logo::where('status',1)->latest()->limit(1)->get();
    	$software = Subcategory::where('id',12)->value('name');
    	$services = Subcategory::limit(5)->get();
    	$addresses = Address::all();
    	$socials = Social::all();
		
		return view('front.description', compact('icons', 'logos', 'software', 'services', 'addresses', 'socials'));

	}

	




}
