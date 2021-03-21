 @extends('front.master.master1')

  @section('title')
About | Codetree
  @endsection

@section('style')

<link rel="stylesheet" href="{{ asset('/') }}public/front/css/service.css" />
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/about.css" />
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

 <section id="about-page" class="py-3">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="about-header">
          <h1 class="title">ABOUT US</h1>
        </div>
        <div class="about-content">
          @foreach($abouts as $about)
          <div class="about-details">
            <p>
             {{ $about->des }}
            </p>
          </div>
          <div class="player1">
            <video
              class="player__video1 viewer"
              src="{{ asset('/') }}{{ $about->video_one }}"
              loop
              autoplay
              muted
            ></video>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <section id="about-video" class="py-3">
      <div class="container">
        <div class="about-header">
          <p class="title">Click the video to know more about us!</p>
        </div>
          @foreach($abouts as $about)
        <div class="player">
          <video class="player__video viewer" src="{{ asset('/') }}{{ $about->video_two }}"></video>

          <div class="player__controls">
            <div class="progress">
              <div class="progress__filled"></div>
            </div>
            <button class="player__button toggle" title="Toggle Play">►</button>
            <input
              type="range"
              name="volume"
              class="player__slider"
              min="0"
              max="1"
              step="0.05"
              value="1"
            />
            <input
              type="range"
              name="playbackRate"
              class="player__slider"
              min="0.5"
              max="2"
              step="0.1"
              value="1"
            />
            <button data-skip="-5" class="player__button">« 5s</button>
            <button data-skip="5" class="player__button">5s »</button>
          </div>
        </div>
        @endforeach
      </div>
    </section>
   
          
 @endsection
 @section('script')
 <script src="{{ asset('/') }}public/front/js/video.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
 @endsection