 @extends('front.master.master')

  @section('title')
Team | Codetree
  @endsection

@section('style')

<link rel="stylesheet" href="{{ asset('/') }}public/front/css/service.css" />
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/team.css" />
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

 
    <section id="team">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="team-header">
          <h1>OUR TEAM</h1>
          <p>
            We believe, "Great things in business are never done by one person.
            They are done by a team of people " -Steve Jobs.
          </p>
          <p>Meet our awesome team members.</p>
        </div>
        <div class="team-members">
          @foreach($teams as $team)
          <div class="team-member">
            <img
              src="{{ asset('') }}{{ $team->image }}"
              alt=""
            />
            <h1>{{ $team->name }}</h1>
            <p style="text-align: center;">{{ $team->title }}</p>
            <ul class="list-social team-social">

              @foreach($links as $link)
              @if($team->name == $link->user_name)
              <li>
                <a href="{{ $link->f_link }}" target="_blank"
                  ><i class="fab fa-facebook-f"></i
                ></a>
              </li>
              <li>
                <a href="{{ $link->ins_link }}" target="_blank"
                  ><i class="fab fa-instagram"></i
                ></a>
              </li>
              <li>
                <a
                  href="{{ $link->linkin_link }}"
                  target="_blank"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </li>
              <li>
                <a
                  href="{{ $link->you_link }}"
                  target="_blank"
                  ><i class="fab fa-youtube"></i
                ></a>
              </li>
              <li>
                <a
                  href="{{ $link->git_link }}"
                  target="_blank"
                  ><i class="fab fa-github"></i
                ></a>
              </li>
              <li>
                <a
                  href="{{ $link->pin_link }}"
                  target="_blank"
                  ><i class="fab fa-pinterest"></i
                ></a>
              </li>
              @endif
             @endforeach
            </ul>
          </div>
         @endforeach
        </div>
        <div class="team-header">
          <h1>ADVISORY BOARD</h1>
        </div>
        <div class="team-members">
          @foreach($teamsa as $team)
          <div class="team-member advisor">
            <img src="{{ asset('/') }}{{ $team->image }}" alt="" />
            <h1>{{ $team->name }}</h1>
            <p style="text-align: center; font-size: 1rem">{{ $team->title }}</p>
            
          </div>
        @endforeach
         
        </div>
      </div>
    </section>
          
 @endsection
 @section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
 @endsection