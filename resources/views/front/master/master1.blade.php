<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <meta name="csrf-token" content="{{ csrf_token() }}">
    @foreach($icons as $icon)
   <link rel="shortcut icon" type="image/png" href="{{asset('/')}}{{$icon->image}}">
   @endforeach
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <script
      src="https://kit.fontawesome.com/23f1789103.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
      integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="{{asset('/')}}public/front/node_modules/@glidejs/glide/dist/css/glide.core.min.css"
    />
    <link
      rel="stylesheet"
      href="{{asset('/')}}public/front/node_modules/@glidejs/glide/dist/css/glide.theme.min.css"
    />
    <!-- Animate On Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/')}}public/front/css/style.css" />
    <link
      rel="stylesheet"
      media="screen and (max-width: 768px)"
      href="{{asset('/')}}public/front/css/mobile.css"
    />
    
    <title>@yield('title')</title>
   @yield('style')
  </head>
  <body>
    <!--for page plugin-->
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=163021345139001&autoLogAppEvents=1" nonce="uEQVY1pO"></script>
    <!--for page plugin-->
    <!--header-section-->
    @include('front.include.header')
<!--header-section-->
    <!-- Showcase -->
    

    @yield('body')

    <!--footer-->
@include('front.include.footer')
      <!--footer-->

    <!-- Glidejs -->
    <script src="{{asset('/')}}public/front/node_modules/@glidejs/glide/dist/glide.min.js"></script>
    <!-- Animate On Scroll AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('/')}}public/front/js/app.js"></script>
    <script src="{{asset('/')}}public/front/js/slider.js"></script>
 <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
               appId            : '2431386933747937',
             autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v5.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="809832952505565"
  theme_color="#67b868">
      </div>
      @yield('script')
  </body>
</html>
