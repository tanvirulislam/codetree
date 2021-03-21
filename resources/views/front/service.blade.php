 @extends('front.master.master')

  @section('title')
{{ $scat }} | Codetree
  @endsection

@section('style')

<link rel="stylesheet" href="{{ asset('/') }}public/front/css/service.css" />
<style type="text/css">
  .service-card h1{
    text-transform: uppercase;
    text-align: center;
    font-weight: bold;
  }
</style>
<link
      rel="stylesheet"
      media="screen and (max-width: 768px)"
      href="{{asset('/')}}public/front/css/mobile.css"
    />
@endsection
  @section('body')

<section id="services">
      <div class="container">
        <div class="service-header">
          <h1>OUR AWESOME SERVICE</h1>
          <h2>{{ $scat }}</h2>
        </div>
      </div>
      <div class="service-content blur">
        
        
        <div class="container">
          
          <div class="service-cards">
@foreach($servicesnew as $service)
<!--<div class="popup">
          <div class="popup-card" data-aos="fade-up" data-aos-duration="1200">
            <img src="{{ asset('/') }}{{ $service->image }}" />
            <a class="btn btn-transparent" onclick="togglePop()" href="#"
              >Close</a
            >
          </div>
        </div>-->
            <a onclick="togglePop()"  href="#" >
              <div class="service-card">
                <h1>{{ $service->name }}</h1>
                <img src="{{ asset('/') }}{{ $service->image }}" alt="" id="example1" />
                <!--<p>View Image</p>-->
              </div>
            </a>
      @endforeach     
          </div>
          
        </div>
      </div>
      
      
    </section>


 @endsection
 @section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
 @endsection