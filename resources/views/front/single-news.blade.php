 @extends('front.master.master')

  @section('title')
News | Codetree
  @endsection

@section('style')

<link rel="stylesheet" href="{{ asset('/') }}public/front/css/service.css" />
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/news.css" />
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

 
    <section id="news-page">
      <div class="popup">
        <div class="news-card" data-aos="fade-up" data-aos-duration="1200">
          <img
            src="https://images.pexels.com/photos/2350514/pexels-photo-2350514.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
          />
          <p>CODETREE & Quantic Dynamics Limited has signed a MOU</p>
          <a class="btn btn-transparent" onclick="togglePop()" href="#"
            >Close</a
          >
        </div>
      </div>
      <div class="container blur" data-aos="fade-up" data-aos-duration="1200">
        <div class="news-page-container">
          <div class="news-page-header">
            <h1 class="title">LATEST NEWS</h1>
            <p>
              We always try to updated. Stay tuned & get the latest news from
              this section.
            </p>
          </div>
          <div class="news-page-content">
            <div class="row">
              <!--first colomn-->
              <div class="column">
             
                <div
                  class="news-card"
                  data-aos="fade-up"
                  data-aos-duration="1200"
                >
                  <img
                    src="{{asset('/')}}{{ $newss->image }}"
                  />
                  <p>{{ $newss->title }}</p>
                 <p>{{ $newss->des }}</p>
                </div>
              
              </div>
            <!--end first-->
           


              <!--third-->
            </div>
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