@extends('front.master.master')

  @section('title')
Hosting | Codetree
  @endsection

@section('style')
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/style.css" />
 <link rel="stylesheet" href="{{ asset('/') }}public/front/css/hosting.css" />
    
 <link
      rel="stylesheet"
      media="screen and (max-width: 768px)"
      href="{{asset('/')}}public/front/css/mobile.css"
    />
@endsection
  @section('body')
    <section id="hosting-pricing" class="py-3">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="hosting-pricing-container">
          <div class="hosting-pricing-header">
            <h1>IBM Cloud (Shared) Hosting Price</h1>
            <p>
              We make sure your website is fast, secure & always up - so your
              visitors & search engines trust you. Guaranteed.
            </p>
            
            <a type="button" href="{{route('hosting')}}" class="btn btn-transparent">Pricing</a>
            &nbsp
            <a type="button" href="{{route('cloud_description')}}" class="btn btn-transparent">Description</a>

          </div>
          <div class="hosting-pricing-packages" id="pricing">
            <div class="hosting-pricing-package">
              <div class="package-header">
                <h1>5 GB</h1>
              </div>
              <p>Starting At ৳ 2000 Per Year</p>
              <ul>
                <li>Storage: 5 GB</li>
                <li>Bandwidth: 50 GB</li>
                <li>FTP Accounts: Unlimited</li>
                <li>Email Accounts: Unlimited</li>
                <li>Group Email: Unlimited</li>
                <li>Database: Unlimited</li>
                <li>Add on Domains: Unlimited</li>
                <li>SSL Certificates: Unlimited</li>
              </ul>
              <a class="btn btn-transparent" href="{{route('create_order_info')}}">Order Now</a>
            </div>
            <div class="hosting-pricing-package">
              <div class="package-header">
                <h1>10 GB</h1>
              </div>
              <p>Starting At ৳ 3000 Per Year</p>
              <ul>
                <li>Storage: 10 GB</li>
                <li>Bandwidth: 100 GB</li>
                <li>FTP Accounts: Unlimited</li>
                <li>Email Accounts: Unlimited</li>
                <li>Group Email: Unlimited</li>
                <li>Database: Unlimited</li>
                <li>Add on Domains: Unlimited</li>
                <li>SSL Certificates: Unlimited</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
            <div class="hosting-pricing-package">
              <div class="package-header">
                <h1>20 GB</h1>
              </div>
              <p>Starting At ৳ 4000 Per Year</p>
              <ul>
                <li>Storage: 20 GB</li>
                <li>Bandwidth: 200 GB</li>
                <li>FTP Accounts: Unlimited</li>
                <li>Email Accounts: Unlimited</li>
                <li>Group Email: Unlimited</li>
                <li>Database: Unlimited</li>
                <li>Add on Domains: Unlimited</li>
                <li>SSL Certificates: Unlimited</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
            <div class="hosting-pricing-package">
              <div class="package-header">
                <h1>30 GB</h1>
              </div>
              <p>Starting At ৳ 5000 Per Year</p>
              <ul>
                <li>Storage: 30 GB</li>
                <li>Bandwidth: 300 GB</li>
                <li>FTP Accounts: Unlimited</li>
                <li>Email Accounts: Unlimited</li>
                <li>Group Email: Unlimited</li>
                <li>Database: Unlimited</li>
                <li>Add on Domains: Unlimited</li>
                <li>SSL Certificates: Unlimited</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
            <div class="hosting-pricing-package">
              <div class="package-header">
                <h1>40 GB</h1>
              </div>
              <p>Starting At ৳ 6000 Per Year</p>
              <ul>
                <li>Storage: 40 GB</li>
                <li>Bandwidth: 400 GB</li>
                <li>FTP Accounts: Unlimited</li>
                <li>Email Accounts: Unlimited</li>
                <li>Group Email: Unlimited</li>
                <li>Database: Unlimited</li>
                <li>Add on Domains: Unlimited</li>
                <li>SSL Certificates: Unlimited</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
            <div class="hosting-pricing-package">
              <div class="package-header">
                <h1>50 GB</h1>
              </div>
              <p>Starting At ৳ 7000 Per Year</p>
              <ul>
                <li>Storage: 50 GB</li>
                <li>Bandwidth: 500 GB</li>
                <li>FTP Accounts: Unlimited</li>
                <li>Email Accounts: Unlimited</li>
                <li>Group Email: Unlimited</li>
                <li>Database: Unlimited</li>
                <li>Add on Domains: Unlimited</li>
                <li>SSL Certificates: Unlimited</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    

    <section id="hosting-partner">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="hosting-partner-header">
          <h2>START BUILDING YOUR IDEAL SOLUTION RIGHT NOW</h2>
          
        </div>
        <div class="hosting-partner-logos">
          <img src="{{asset('/')}}public/front/img/IBM.png" alt="" />
          <img src="{{asset('/')}}public/front/img/IBM-Cloud.png" alt="" />
          <img src="{{asset('/')}}public/front/img/Red-Hat.png" alt="" />
          <img src="{{asset('/')}}public/front/img/barracuda.png" alt="" />
          <img src="{{asset('/')}}public/front/img/Microsoft.png" alt="" />
          <img src="{{asset('/')}}public/front/img/DigiCert.png" alt="" />
        </div>
        
        <a href="#" class="btn btn-transparent">Contact Now</a>
      </div>
    </section>
 @endsection