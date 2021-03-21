<div id="banner">
      <div class="container">
        <div class="banner-container">
          <div
            class="banner-content"
            data-aos="fade-up"
            data-aos-duration="1200"
          >
          @foreach($banners as $banner)
            <h1>WE CODE BETTER <span class="primary-color">LIFE</span></h1>
            <p>
             {{ $banner->des }}
            </p>
            <a
              href="{{ $banner->link }}"
              target="_blank"
              class="btn btn-transparent"
              >{{ $banner->btitle }}</a
            >
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="player2">
      <video
        class="player__video2 viewer"
        src="{{ asset('/') }}public/front/img/Video.m4v"
        loop
        autoplay
        muted
      ></video>
    </div>