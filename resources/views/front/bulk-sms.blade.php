@extends('front.master.master')

  @section('title')
Bulk Sms| Codetree
  @endsection

@section('style')
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/style.css" />
 <link rel="stylesheet" href="{{ asset('/') }}public/front/css/adn-sms.css" />
    <link
      rel="stylesheet"
      media="screen and (max-width: 768px)"
      href="{{asset('/')}}public/front/css/mobile.css"
    /> 

@endsection
  @section('body')
<div id="banner">
      <div class="container">
        <div class="banner-container">
          <div
            class="banner-content"
            data-aos="fade-up"
            data-aos-duration="1200"
          >
            <h1>BEST BULK SMS PRICES & PACKAGES FOR YOU</h1>
            
          </div>
        </div>
      </div>
    </div>

    <!-- <div id="masking-sms" class="py-2">
      <div class="container">
        <div
          class="masking-sms-container"
          data-aos="fade-up"
          data-aos-duration="1200"
        >
          <div class="masking-sms-container-header">
            <h1>MASKING SMS</h1>
            <p>
              ADNsms helps you to make your messages more recognizable by
              customizing your sender ID as Masking SMS. Now you can send your
              SMS after you or your company’s name. After purchasing the
              package, please follow instructions sent by email to complete the
              rest of the account creation process.
            </p>
            <h3>
              THIS IS A SPECIAL PRICE FOR BUSINESSES TRYING TO COPE WITH COVID19
            </h3>
          </div>
          <div class="package-container">
            <div class="package">
              <div class="package-header">
                <h1>Basic</h1>
              </div>
              <p>10,000 SMS</p>
              <ul>
                <li>Masking SMS</li>
                <li>BDT 5,050</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
            <div class="package">
              <div class="package-header">
                <h1>Small Business</h1>
              </div>
              <p>20,000 SMS</p>
              <ul>
                <li>Masking SMS</li>
                <li>BDT 9,500</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
            <div class="package">
              <div class="package-header">
                <h1>Pro</h1>
              </div>
              <p>50,000 SMS</p>
              <ul>
                <li>Masking SMS</li>
                <li>BDT 21,000</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <div id="non-masking-sms" class="py-2">
      <div class="container">
        <div
          class="masking-sms-container"
          data-aos="fade-up"
          data-aos-duration="1200"
        >
          <div class="masking-sms-container-header">
            <h1>NON-MASKING SMS</h1>
            <!--<p>
              ADNsms helps you to make your messages more recognizable by
              customizing your sender ID as Masking SMS. Now you can send your
              SMS after you or your company’s name. After purchasing the
              package, please follow instructions sent by email to complete the
              rest of the account creation process.
            </p>
            <h3>
              THIS IS A SPECIAL PRICE FOR BUSINESSES TRYING TO COPE WITH COVID19
            </h3>-->
          </div>
          <div class="package-container">
            <div class="package">
              <div class="package-header">
                <h1>Basic</h1>
              </div>
              <p>10,000 SMS</p>
              <ul>
                <li>Non-Masking SMS</li>
                <li>BDT 3,000</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
            
            <div class="package">
              <div class="package-header">
                <h1>Small Business</h1>
              </div>
              <p>20,000 SMS</p>
              <ul>
                <li>Non-Masking SMS</li>
                <li>BDT 5,800</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
            <div class="package">
              <div class="package-header">
                <h1>Pro</h1>
              </div>
              <p>50,000 SMS</p>
              <ul>
                <li>Non-Masking SMS</li>
                <li>BDT 12,800</li>
              </ul>
              <a class="btn btn-transparent" href="http://">Order Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--<div
      id="banner-features"
      class="py-2"
      data-aos="fade-up"
      data-aos-duration="1200"
    >
      <div class="container">
        <div class="amazing-features-container">
          <div class="amazing-features-header">
            <h1>USE SMS TO ESTABLISH BRAND AWARENESS & CUSTOMER LOYALTY</h1>
            <p>
              Use our Campaign Portal or connect our platform to your website,
              application or software and send automated and other system
              generated Bulk SMS. Our API connects to any system old & new. The
              Campaign Portal is easy to use on any device:
            </p>
          </div>
          <div class="features" data-aos="fade-up" data-aos-duration="1200">
            <div class="feature">
              <i class="fa fa-globe"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
            <div class="feature">
              <i class="fa fa-tags"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
            <div class="feature">
              <i class="fa fa-tags"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
            <div class="feature">
              <i class="fa fa-tags"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      id="amazing-features"
      class="py-2"
      data-aos="fade-up"
      data-aos-duration="1200"
    >
      <div class="container">
        <div class="amazing-features-container">
          <div class="amazing-features-header">
            <h1>AMAZING FEATURES FOR YOU</h1>
          </div>
          <div class="features">
            <div class="feature">
              <i class="fa fa-globe"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
            <div class="feature">
              <i class="fa fa-tags"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
            <div class="feature">
              <i class="fa fa-tags"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
            <div class="feature">
              <i class="fa fa-tags"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
            <div class="feature">
              <i class="fa fa-globe"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
            <div class="feature">
              <i class="fa fa-tags"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
            <div class="feature">
              <i class="fa fa-tags"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
            <div class="feature">
              <i class="fa fa-tags"></i>
              <h2>GEO-LOCATION CAMPAIGNS</h2>
              <p>Run location and area- wise SMS marketing campaigns</p>
            </div>
          </div>
        </div>
      </div>
    </div>-->
 @endsection