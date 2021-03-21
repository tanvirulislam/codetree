@extends('front.master.master')

@section('title')
Order dtails | Codetree
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/style.css"/>
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/hosting.css"/>
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/software.css"/>
    
<link rel="stylesheet" media="screen and (max-width: 768px)" href="{{asset('/')}}public/front/css/mobile.css" />
@endsection
@section('body')
<section id="demo" class="py-3">
 <div class="" style="">
    <div class="form-container form_container_height" style=" margin:11px;">
     <div class="form">
       <h2>Order information</h2>
       <form id="login-form" action="{{route('store_order_info')}}" method="POST">
         @csrf
         <div class="inputBox">
           <input id="user" type="text" placeholder="Name"  name="name">
         </div>
         <div class="inputBox">
           <input id="email" type="email" placeholder="Email" name="email" >
         </div>
         <div class="inputBox">
           <input  id="profession" type="text" placeholder="Mobile" name="mobile" required>
         </div>
         <div class="inputBox">
           <input id="purpose" type="text" placeholder="Company" name="company">
         </div>
         <div class="inputBox">
           <input id="number" type="text" placeholder="Address" name="address">
         </div>
        
         <div class="inputBox">
            <input id="bundle" type="text" placeholder="Bandwidth" name="bandwidth" required>
        </div>
        <div class="inputBox">
            <input id="price" type="number" placeholder="Price" name="price" required>
        </div>
         
         
         <div class="inputBox">
           <input type="submit" value="Submit" >
         </div>
       </form>
     </div>
   </div>
</div>
</section>

@endsection