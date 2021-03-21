<nav id="header" class="main-nav">
      <div class="header container">
        @foreach($logos as $logo)
        <a href="{{ route('index') }}"><img src="{{ asset('/') }}{{ $logo->image }}" class="logo" /></a>
     @endforeach
        <div class="nav-list">
          <div class="hamburger"><div class="bar"></div></div>
          <ul>
            <li>
                
            <a class="{{ Request::is('/') ? 'current' : '' }}" href="{{ route('index') }}" data-after="Home">Home</a>
            </li>
            <li class="dropdown" id="drop1">
              <a class="dropbtn skip" onclick="toggleNav1()" data-after="Software">
               {{ $software}}
              </a>
              <div class="dropdown-content">
                <a href="{{ route('Pos&Inventory') }}">Pos & Inventory</a>
                <a href="{{ route('school&management') }}">School & College Management</a>
              </div>
            </li>
            <li class="dropdown" id="drop2">
              <a class="dropbtn skip" onclick="toggleNav2()"  data-after="Services" class="{{ Request::is('service*') || Request::is('bulk-sms') || Request::is('hosting')  ? 'current' : '' }}"  >Services</a>
              <div class="dropdown-content">
                 @foreach($services as $service)
                <a href="{{ route('service',$service->slug) }}">{{ $service->name }}</a>
                @endforeach
                <a href="{{ route('bulk-sms') }}">Bulk Sms</a>
                 <a href="{{ route('hosting') }}">Cloud Hosting</a>
              </div>
            </li>
            <li>
              <a href="{{ route('portfolio') }}" class="{{ Request::is('all/portfolio') ? 'current' : '' }}"  data-after="Portfolio">Portfolio</a
              >
            </li>
            <li>
              <a href="{{ route('news') }}" class="{{ Request::is('news') ? 'current' : '' }}" data-after="News" >News</a>
            </li>
            <li>
              <a href="{{ route('about') }}" data-after="About" class="{{ Request::is('about') ? 'current' : '' }}">About</a
              >
            </li>
            <li>
              <a href="{{ route('team') }}" data-after="Team" class="{{ Request::is('team') ? 'current' : '' }}">Team</a>
            </li>
            <li>
              <a href="{{ route('contact') }}" data-after="Contact" class="{{ Request::is('contact') ? 'current' : '' }}">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>