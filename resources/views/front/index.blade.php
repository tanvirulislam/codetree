  @extends('front.master.master1')

  @section('title')
Home | Codetree
  @endsection

  @section('body')
<!--banner section -->
@include('front.include.banner')
    <!--banner section -->
<section id="about" class="py-3">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="about-header">
          <h1 class="l-heading uppercase">Why choose us?</h1>
          @foreach($chooseTitle as $title)
          <p>
            {{ $title->htitle }}
          </p>
          @endforeach
        </div>
        <div class="about-cards py-1">
          
          
         @foreach($chooses as $choose) 
          <div class="card">
            <div class="card-icon">
              <i class="{{ $choose->Icon }} text-center"></i>
            </div>
            <div class="card-content">
              <div class="card-title">
                <h2>0{{ $loop->index+1 }}</h2>
                <h2>{{ $choose->title }}</h2>
              </div>
              <div class="card-text">
                <p>
                 {{ $choose->des }}
                </p>
              </div>
            </div>
          </div>
         @endforeach
          
        </div>
      </div>
    </section>

    <section id="features" class="py-4">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="features-container">
          <div class="features-header py-1">
            <h1 class="l-heading text-center uppercase">Awesome Featuress</h1>
            @foreach($featureTitle as $title)
            <p class="text-center">
              {{ $title->htitle }}
            </p>
            @endforeach
          </div>
          <div class="features-cards about-cards">

            @foreach($features as $feature) 
            <div class="card">
              <div class="card-icon">
                <i class="{{ $feature->Icon }}"></i>
              </div>
              <div class="card-content">
                <div>
                  <h2>{{ $feature->title }}</h2>
                </div>
                <div class="card-text">
                  <p>
                    {{ $feature->des }}
                  </p>
                </div>
              </div>
            </div>
            @endforeach
          
            
           
           

          </div>
        </div>
      </div>
    </section>

    <!-- Divider -->
    <!-- Divider -->
    <!-- Divider -->
    <section id="divider-section">
      <div class="container">
        <div class="divider">
          <h2>Find Us On</h2>
          <ul class="list-social">

            @foreach($socials as $social)
            <li>
              <a href="{{ $social->link }}" target="_blank"
                ><i class="{{ $social->Icon }}"></i
              ></a>
            </li>
             @endforeach
           
          </ul>
        </div>
      </div>
    </section>
    <!-- <h2>Our Clients</h2> -->
    <!-- Divider -->
    <!-- Divider -->
    <!-- Divider -->

    <!-- <section id="portfolio" class="py-4">
    </section> -->

    <section id="client" class="py-3">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="client-container">
          <div class="client-header py-1">
            <h1 class="l-heading uppercase">Trusted Since 2017</h1>
            <p>Clients we worked with</p>
          </div>
          <div class="client-content-background">
            <div class="client-content">
              <div class="glide" id="glide_5">
                <div class="glide__track" data-glide-el="track">
                  <ul class="glide__slides">

                    <li class="glide__slide">
                      <div class="card-wraper">
                        @foreach($firstSection as $first)
                        <div class="card">
                          <img src="{{ asset('/') }}{{ $first->image }}" alt="" />
                        </div>
                        @endforeach
                       
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="card-wraper">
                        @foreach($secondSection as $first)
                        <div class="card">
                          <img src="{{ asset('/') }}{{ $first->image }}" alt="" />
                        </div>
                        @endforeach
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="card-wraper">
                        @foreach($thirdSection as $first)
                        <div class="card">
                          <img src="{{ asset('/') }}{{ $first->image }}" alt="" />
                        </div>
                        @endforeach
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonial -->
    <section class="section testimonial" id="testimonial">
      <div
        class="testimonial__container"
        data-aos="fade-up"
        data-aos-duration="1200"
      >
        <div class="glide" id="glide_3">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
              @foreach($clients as $client)
              <li class="glide__slide">
                <div class="testimonial__box">
                  <div class="client__image">
                    <img src="{{ asset('') }}{{ $client->image }}" alt="" />
                  </div>
                  <p>
                    <i class="fas fa-quote-left"></i>
                          {{ $client->com }}
                    <i class="fas fa-quote-right"></i>
                  </p>
                  <div class="client__info">
                    <h3>{{ $client->name }}</h3>
                    <span>{{ $client->title }} at <a href="{{ $client->link }}" style="color:white;">{{ $client->c_name }}</a></span>
                  </div>
                </div>
              </li>
             @endforeach
             
            
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
    <!-- Testimonial -->

    <!-- News -->
    <div id="news" class="news__container">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="news-container-background">
          <div class="news-header">
            <h1>News</h1>
            <p>Stay connected & get the latest news about us.</p>
          </div>
          <div class="glide" id="glide_4">
            <div class="glide__track" data-glide-el="track">
              <ul class="glide__slides">

@foreach($news as $new)
                <li class="glide__slide">
                  <div class="new__card">
                    <div class="card__header">
                      <img src="{{ asset('/') }}{{ $new->image }}" alt="" />
                      <a class="btn btn-transparent" href="http://"
                        >{{ $new->title }}</a
                      >
                    </div>
                  </div>
                </li>
@endforeach
         
              </ul>
            </div>
          </div>
          <div class="news__footer">
            <a
              href="{{ route('news') }}"
              target="_blank"
              class="btn btn-transparent"
              >See All</a
            >
          </div>
        </div>
      </div>
    </div>
    <!-- News -->

    <section id="share-idea">
      <div class="share-idea-container">
        <div
          class="share-idea-content py-1"
          data-aos="fade-up"
          data-aos-duration="1200"
        >
          <h1 class="l-heading uppercase">SHARE YOUR IDEAS WITH US</h1>
          <p>
            Software Development, Website Design, Mobile Application & Digital
            Marketing Solution
          </p>
          <a class="btn btn-transparent">Call Us +88 0171-007-0606</a>
        </div>
      </div>
    </section>
  @endsection