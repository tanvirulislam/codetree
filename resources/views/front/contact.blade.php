 @extends('front.master.master1')

  @section('title')
Contact | Codetree
  @endsection

@section('style')

<link rel="stylesheet" href="{{ asset('/') }}public/front/css/service.css" />
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/contact.css" />
<style type="text/css">
  .service-card h1{
    text-transform: uppercase;
    text-align: center;
    font-weight: bold;
  }
</style>
@endsection
  @section('body')

 <section id="contact">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="contact-header">
          <h1>GET IN TOUCH</h1>
        </div>
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
            <h3>SAY SOMETHING</h3>
            <input type="text" placeholder="Your Name" />
            <input type="email" placeholder="Your Email" />
            <textarea
              name="message"
              id="message"
              cols="30"
              rows="10"
              placeholder="Write your message"
            ></textarea>
            <button type="submit" class="btn">Send</button>
          </div>
        </div>
      </div>
    </section>
   
          
 @endsection
 @section('script')
 <script src="{{ asset('/') }}public/front/js/video.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
 @endsection