@extends('front.master.master')

@section('title')
Pos & Inventory | Codetree
@endsection

@section('css')

@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/style.css" />
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/hosting.css" />
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/software.css" />
<link
rel="stylesheet" media="screen and (max-width: 768px)" href="{{asset('/')}}public/front/css/mobile.css" />
@endsection
@section('body')

<section id="demo" class="py-3">
 <div class="popup">
   <div class="form-container form_container_height">
     <div class="form">
       <h2>Request Form</h2>
       <form id="login-form" action="{{route('requestdemologin')}}" method="POST">
         @csrf
         <div class="inputBox">
           <input id="user" type="text" placeholder="Name"  name="request_name">
         </div>
         <div class="inputBox">
           <input id="email" type="email" placeholder="Email" name="request_email" >
         </div>
         <div class="inputBox">
           <input  id="profession" type="text" placeholder="Profession" name="request_profesion">
         </div>
         <div class="inputBox">
           <input id="purpose" type="text" placeholder="Purpose" name="request_purpose">
         </div>
         <div class="inputBox">
           <input id="number" type="text" placeholder="Phone number" name="phn_number">
         </div>
         <div class="inputBox">
           <input id="software_name" type="hidden" value="pos" name="request_software_name">
         </div>
         <div class="inputBox">
           <input type="submit" value="Submit" >
         </div>
         <a class="btn btn-transparent" onclick="togglePopForm()" href="#" >Not Now</a>
       </form>
     </div>
   </div>
 </div>
 <div class="container">
   <div class="demo-container" data-aos="fade-up" data-aos-duration="1200">
     <div class="demo-header">
       <h1>
         Online Accounting Billing Inventory Management System - Purchase,
         Sales, Stock, Billing Software
       </h1>
           <!-- <p>
             * ক্রয় হিসাব * বিক্রয় হিসাব * স্টক রিপোর্ট * বিল/ইনভয়েস * চালান *
             বকেয়া রিপোর্ট *
           </p> -->
           @if($errors->any())
           <div class="alert alert-danger" style="color: red; font-size: initial; border-radius: 4px;">
             <p><strong>Opps Something went wrong</strong></p>
             <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
             </ul>
           </div>
           @endif

           @if(session('success'))
           <div class="alert alert-success" style="background-color: green; color: white; font-size: initial;  border-radius: 4px;">{{session('success')}}</div>
           @endif

           @if(session('error'))
           <div class="alert alert-danger" style="color: red;font-size: initial; border-radius: 4px;">{{session('error')}}</div>
           @endif

           
           <a style="margin-top: 10px;" class="btn btn-transparent" onclick="togglePopForm()" href="#" >See Demo of this Software</a>
         </div>
         <div class="demo-pic">
           <img src="{{asset('/')}}public/front/img/software-demo.png" alt="pictre" />
         </div>
       </div>
     </div>
   </section>

   <section id="best-features" class="py-3">
     <div class="container">
       <div
       class="best-features-container"
       data-aos="fade-up"
       data-aos-duration="1200"
       >
       <div class="best-features-header">
         <h1>Best Features Ever</h1>
       </div>
       <div class="best-features">
         <div class="best-feature">
           <img src="{{asset('/')}}public/front/img/kroy.jpg" alt="" />
           <h2>Purchase account</h2>
           <p>
             All the accounts of the purchased goods, from whom the purchase
             was made, how much bill payment and how much money will be
             received, all the reports can be found out by date.
           </p>
         </div>
         <div class="best-feature">
           <img src="{{asset('/')}}public/front/img/bikroy.jpg" alt="" />
           <h2>Sales account</h2>
           <p>
             You will be able to find out the total amount of money sold to a
             customer, how much is the bill, how much is the payment and the
             rest of the report according to the date.
           </p>
         </div>
         <div class="best-feature">
           <img src="{{asset('/')}}public/front/img/stock.jpg" alt="" />
           <h2>Stock Report</h2>
           <p>
             How many pieces of products have been sold to whom, how many
             pieces products are in stock and How many pieces have been sold
             in total and how many pieces are currently in stock.
           </p>
         </div>
         <div class="best-feature">
           <img src="{{asset('/')}}public/front/img/bill.jpg" alt="" />
           <h2>Bill/Invoice</h2>
           <p>
             You can create automatic bill / invoice that you have of
             computer or keep mobile Safe in print and PDF formats.
           </p>
         </div>
         <div class="best-feature">
           <img src="{{asset('/')}}public/front/img/customer.jpg" alt="" />
           <h2>Customer</h2>
           <p>
             You can save all your customer information including photos and
             groups.
           </p>
         </div>
         <div class="best-feature">
           <img src="{{asset('/')}}public/front/img/report.jpg" alt="" />
           <h2>Report</h2>
           <p>
             You can issue all reports on date to date, monthly, yearly
             basis.
           </p>
         </div>
       </div>
     </div>
   </div>
 </section>

 <section id="dashboard" class="py-3">
   <div class="container">
     <div
     class="dashboard-container"
     data-aos="fade-up"
     data-aos-duration="1200"
     >
     <div class="dashboard-header">
       <h1>Dashboard</h1>
       <ul>
         <li>Bill/Invoice Amount</li>
         <li>Receive Amount</li>
         <li>Total Due Amount</li>
         <li>Today Received</li>
         <li>Today Expenses</li>
         <li>Today Balance</li>
       </ul>
     </div>
     <div class="dashboard-pic">
       <img src="{{asset('/')}}public/front/img/dashboard.png" alt="" />
     </div>
   </div>
 </div>
</section>

<section class="section testimonial" id="testimonial">
 <div
 class="testimonial__container"
 data-aos="fade-up"
 data-aos-duration="1200"
 >
 <div class="glide" id="glide_3">
   <div class="glide__track" data-glide-el="track">
     <ul class="glide__slides">
       <li class="glide__slide">
         <div class="container">
           <div class="testimonial__box">
             <img src="{{asset('/')}}public/front/img/screenshot1.png" alt="" />
           </div>
         </div>
       </li>
       <li class="glide__slide">
         <div class="container">
           <div class="testimonial__box">
             <img src="{{asset('/')}}public/front/img/screenshot1.png" alt="" />
           </div>
         </div>
       </li>
       <li class="glide__slide">
         <div class="container">
           <div class="testimonial__box">
             <img src="{{asset('/')}}public/front/img/screenshot1.png" alt="" />
           </div>
         </div>
       </li>
       <li class="glide__slide">
         <div class="container">
           <div class="testimonial__box">
             <img src="{{asset('/')}}public/front/img/screenshot1.png" alt="" />
           </div>
         </div>
       </li>
     </ul>
   </div>
   <div class="glide__bullets" data-glide-el="controls[nav]">
     <button class="glide__bullet" data-glide-dir="=0"></button>
     <button class="glide__bullet" data-glide-dir="=1"></button>
     <button class="glide__bullet" data-glide-dir="=2"></button>
     <button class="glide__bullet" data-glide-dir="=3"></button>
   </div>
 </div>
</div>
</section>

<section id="hosting-pricing" class="py-3">
 <div class="container" data-aos="fade-up" data-aos-duration="1200">
   <div class="hosting-pricing-container">
     <div class="hosting-pricing-header">
       <h1>Our Pricing & Plans</h1>
           <!-- <p>
             We make sure your website is fast, secure & always up - so your
             visitors & search engines trust you. Guaranteed.
           </p> -->
         </div>
         <div class="hosting-pricing-packages">
           <div class="hosting-pricing-package">
             <div class="package-header">
               <h1>Starting Fee (One Time Payment)</h1>
             </div>
             <p>৳ 19,999</p>
             <ul>
               <li>Software Setup</li>
               <li>Training</li>
               <li>Domain Registration</li>
               <li>5GB SSD Hosting</li>
               <li>Company Website</li>
             </ul>
             <a class="btn btn-transparent" href="http://">Contact Us</a>
           </div>
           <div class="hosting-pricing-package">
             <div class="package-header">
               <h1>Monthly Maintanance Charge</h1>
             </div>
             <p>৳ 1,000</p>
             <ul>
               <li>Hosting 5GB Renew</li>
               <li>Software Maintanance</li>
               <li>SSL Certificate</li>
               <li>Daily auto backup</li>
             </ul>
             <a class="btn btn-transparent" href="http://">Contact Us</a>
           </div>
           <div class="hosting-pricing-package">
             <div class="package-header">
               <h1>Hosting Space (Extra)</h1>
             </div>
             <p>৳ 2000</p>
             <ul>
               <li>5 GB</li>
               <li>Cloud</li>
               <li>Daily auto backup</li>
               <li>SSL Certificate</li>
               <li>Unlimited Webmail</li>
             </ul>
             <a class="btn btn-transparent" href="http://">Contact Us</a>
           </div>
         </div>
       </div>
     </div>
   </section>



   @endsection

   @section('script')
   
   @endsection