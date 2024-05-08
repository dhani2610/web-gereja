<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      {{-- <h1 class="logo"><a href="index.html">Gereja</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      {{-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>--> --}}

      {{-- <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo" /> --}}
      <img
          src="vendors/images/deskapp-logo-white.svg"
          alt=""
          class="light-logo"  
      />

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
          <li><a class="nav-link scrollto {{ request()->is('pengurus') ? 'active' : '' }}" href="{{ url('pengurus') }}">Pengurus</a></li>
          <li><a class="nav-link scrollto {{ request()->is('gallery') ? 'active' : '' }}" href="{{ url('gallery') }}">Galery</a></li>
          <li><a class="nav-link scrollto {{ request()->is('jadwal') ? 'active' : '' }}" href="{{ url('jadwal') }}">Jadwal Ibadah</a></li>
          <li><a class="nav-link  scrollto {{ request()->is('daftar-donasi') ? 'active' : '' }}" href="{{ url('daftar-donasi')}}">Daftar Donasi</a></li>
          <li><a class="nav-link scrollto {{ request()->is('jemaat') ? 'active' : '' }}" href="{{ url('jemaat')  }}">Data Jemaat</a></li>
          <li><a class="nav-link scrollto {{ request()->is('warta-online') ? 'active' : '' }}" href="{{ url('warta-online')  }}">Warta Jemaat</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>