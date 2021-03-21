 @extends('front.master.master')

  @section('title')
{{ $portfolios->name }} | Codetree
  @endsection

@section('style')

<link rel="stylesheet" href="{{ asset('/') }}public/front/css/service.css" />
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/portfolio.css" />
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

 
    <section id="web-project" class="py-3">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="portfolio-container">
          <div class="portfolio-header">
            <h1 class="uppercase">{{ $portfolioscat }}</h1>
            <p>
              We work with multiple projects. these are some of our best works
              so far.
            </p>
          </div>
          <div class="portfolio-content-background">
            <div class="portfolio-content">
              <div class="portfolio-item">
               
                  <div class="img-div">
                    <img src="{{ asset('/') }}{{ $portfolios->image }}" alt="" />
                   </p>
                  </div>
               
               <h2>{{ $portfolios->name }}</h2>
               
              </div>
            </div>
          </div>
          <div class="portfolio-description">
            <div class="portfolio-tags">
              <div class="portfolio-tag">
                <h4>Client</h4>
                <p>{{ $portfolios->c_name }}</p>
              </div>
              <div class="portfolio-tag">
                <h4>Project Link</h4>
                <p>
<a href="{{ $portfolios->link }}">Link</a>
                  


                </p>
              </div>
              <div class="portfolio-tag">
                <h4>Category</h4>
                <p>{{ $portfolioscat }}</p>
              </div>
            </div>
            <div class="portfolio-feedbacks">
              <div class="portfolio-feedback">
               {!! $portfolios->des !!}
              </div>
              
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