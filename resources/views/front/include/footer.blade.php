<footer id="main-footer" class="py-4">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="footer-content py-1">
          <div class="content-left">
            @foreach($addresses as $address)
            <h2>{{ $address->title }}</h2>
            <p>
              {{ $address->des }}
            </p>
            <ul class="list-contact">
              <li>
                <i class="far fa-envelope"></i>
                {{ $address->email }}
              </li>
              <li><i class="fas fa-mobile-alt"></i>{{ $address->phone }}</li>
              <li>
                <i class="fas fa-map-marker-alt"></i>
                {{ $address->add }}
              </li>
            </ul>
            <iframe
              src="{{ $address->loaction }}"
              id="map"
              frameborder="0"
              style="border: 0"
              allowfullscreen=""
              aria-hidden="false"
              tabindex="0"
            ></iframe>
            @endforeach
          </div>
          <div class="content-right">
            <h2>Follow Us</h2>
            <div class="fb-page" data-href="https://www.facebook.com/codetreebd" 
            data-tabs="timeline" data-width="500" data-height="500" data-small-header="false" 
            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/codetreebd" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/codetreebd">CODETREE</a></blockquote></div>
          </div>
        </div>
        <div class="footer-end">
          <p>&copy;2017 - <span id="year"></span> Copyright <b>CODETREE</b></p>
          <ul class="list-social">
             @foreach($socials as $social)
            <li>
              <a href="{{ $social->link }}" target="_blank"
                ><i class="{{ $social->Icon }}"></i
              ></a>
            </li>
          @endforeach
          </ul>
          <ul class="list-col">
             @foreach($addresses as $address)
            <li>
              <a
                href="{{ $address->term }}"
                target="_blank"
                >Terms & Conditions</a
              >
            </li>
            <!--<li>
              <a href="https://www.facebook.com/codetreebd" target="_blank"
                ><b>CODETREE</b></a
              >
            </li>-->
            <li>
              <a
                href="{{ $address->locationlink }}"
                target="_blank"
                >Location</a
              >
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </footer>