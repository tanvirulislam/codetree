 @extends('front.master.master')

  @section('title')
School & College Management | Codetree
  @endsection

@section('style')
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/style.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/front/css/hosting.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/front/css/software.css" />
<link
      rel="stylesheet"
      media="screen and (max-width: 768px)"
      href="{{asset('/')}}public/front/css/mobile.css"
    />
@endsection
  @section('body')

<section id="demo" class="py-3">
      <div class="popup">
        <div class="form-container">
          <div class="form">
            <h2>REQUEST Form</h2>
            <form id="login-form" action="{{route('requestdemologin')}}" method="POST">
            @csrf
              <div class="inputBox">
                <input id="user" type="text" placeholder="Name"  name="request_name"/>
              </div>
              <div class="inputBox">
                <input id="email" type="email" placeholder="Email" name="request_email" />
              </div>
              <div class="inputBox">
                <input id="profession" type="text" placeholder="Profession" name="request_profesion" />
              </div>
              <div class="inputBox">
                <input id="purpose" type="text" placeholder="purpose" name="request_purpose"/>
              </div>
              <div class="inputBox">
                <input id="number" type="text" placeholder="Phone number" name="phn_number">
              </div>
              <div class="inputBox">
                <input id="software_name" type="hidden" value="School and Collage Management" name="request_software_name">
              </div>
              <div class="inputBox">
                <input type="submit" value="Submit" />
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
              Online School/College Management System - Student Info, Teacher
              Info, Parents Info,Result system, Income & expenditure Info
              Software
            </h1>

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

            <a class="btn btn-transparent" onclick="togglePopForm()" href="#">See Demo of this Software</a>
          </div>
          <div class="demo-pic">
            <img src="{{ asset('/') }}public/front/img/software-demo.png" alt="" />
          </div>
        </div>
      </div>
    </section>

    <section id="best-features" class="py-3">
      <div class="container">
        <div
          class="best-features-container"
          data-aos="fade-up"
          data-aos-duration="1200">
          <div class="best-features-header">
            <h1>Best Features Ever</h1>
          </div>
          <div class="best-features">
            <div class="best-feature">
              <img src="{{ asset('/') }}public/front/img/student.png" alt="" />
              <h2>Student Information</h2>
            </div>
            <div class="best-feature">
              <img src="{{ asset('/') }}public/front/img/parents.png" alt="" />
              <h2>Parent Information</h2>
            </div>
            <div class="best-feature">
              <img src="{{ asset('/') }}public/front/img/teacher.png" alt="" />
              <h2>Teacher Information</h2>
            </div>
            <div class="best-feature">
              <img src="{{ asset('/') }}public/front/img/department-information.png" alt="" />
              <h2>Class/Department Information</h2>
            </div>
            <div class="best-feature">
              <img src="{{ asset('/') }}public/front/img/result.png" alt="" />
              <h2>Result System</h2>
            </div>
            <div class="best-feature">
              <img src="{{ asset('/') }}public/front/img/income.png" alt="" />
              <h2>Income & Expenditure Information</h2>
            </div>
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
                    <img src="{{ asset('/') }}public/front/img/s2.png" alt="" />
                  </div>
                </div>
              </li>
              <li class="glide__slide">
                <div class="container">
                  <div class="testimonial__box">
                    <img src="{{ asset('/') }}public/front/img/s2.png" alt="" />
                  </div>
                </div>
              </li>
              <li class="glide__slide">
                <div class="container">
                  <div class="testimonial__box">
                    <img src="{{ asset('/') }}public/front/img/s2.png" alt="" />
                  </div>
                </div>
              </li>
              <li class="glide__slide">
                <div class="container">
                  <div class="testimonial__box">
                    <img src="{{ asset('/') }}public/front/img/s2.png" alt="" />
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