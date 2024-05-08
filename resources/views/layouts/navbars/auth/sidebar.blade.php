
<style>
.navbar-vertical.navbar-expand-xs .navbar-collapse{
  height: calc(100vh)!important;
}
.navbar-vertical.navbar-expand-xs.fixed-start{
  background: #ffffff;
}
.navbar-vertical .navbar-nav>.nav-item .nav-link.active {
  background-color: #142127;
  color: white;
  font-size: 14px;
}
.navbar-vertical.navbar-expand-xs .navbar-nav .nav-link {
    color: black;
    font-size: 14px;
    font-weight: 600;
    margin: 0 1rem;
    padding-bottom: .675rem;
    padding-top: .675rem;
}
.navbar-vertical.navbar-expand-xs .navbar-nav .nav-link:hover {
  background-color: #142127;
  color: white!important;
  font-size: 14px;
}
</style>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 fixed-start  ps ps--active-y" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
      <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
      <img
          src="vendors/images/deskapp-logo-white.svg"
          alt=""
          class="light-logo"  
      />
        {{-- <span class="ms-3 font-weight-bold">Dashboard Gereja</span> --}}
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
          <i style="    font-size: 20px;" class="fas fa-lg fa fa-bar-chart-o	ps-2 pe-2 text-center text-dark {{ (Request::is('dashboard') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('about') ? 'active' : '') }}" href="{{ url('about') }}">
            <i style="    font-size: 20px;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ (Request::is('about') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            <span class="nav-link-text ms-1">About</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('slider') ? 'active' : '') }}" href="{{ url('slider') }}">
            <i style="    font-size: 20px;" class="fas fa-lg fa-images ps-2 pe-2 text-center text-dark {{ (Request::is('slider') ? 'text-white' : 'text-dark') }}" aria-hidden="true"></i>
            <span class="nav-link-text ms-1">Slider</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('galery') ? 'active' : '') }}" href="{{ url('galery') }}">
            <i style="    font-size: 20px;" class="fas fa-lg fa-images ps-2 pe-2 text-center text-dark {{ (Request::is('galery') ? 'text-white' : 'text-dark') }}" aria-hidden="true"></i>
            <span class="nav-link-text ms-1">Gallery</span>
        </a>
      </li>

      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('donasi') ? 'active' : '') }}" href="{{ url('donasi') }}">
          <i style="    font-size: 20px;" class="fas fa-lg fa fa-handshake-o	ps-2 pe-2 text-center text-dark {{ (Request::is('donasi') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            <span class="nav-link-text ms-1">Donasi</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('warta-jemaat') ? 'active' : '') }}" href="{{ url('warta-jemaat') }}">
          <i style="    font-size: 20px;" class="fas fa-lg fa fa-file-pdf-o	ps-2 pe-2 text-center text-dark {{ (Request::is('warta-jemaat') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            <span class="nav-link-text ms-1">Warta Jemaat</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('faq') ? 'active' : '') }}" href="{{ url('faq') }}">
          <i style="    font-size: 20px;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ (Request::is('faq') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            <span class="nav-link-text ms-1">FAQ</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('jadwal-ibadah') ? 'active' : '') }}" href="{{ url('jadwal-ibadah') }}">
          <i style="    font-size: 20px;" class="fas fa-lg fa fa-calendar	ps-2 pe-2 text-center text-dark {{ (Request::is('jadwal-ibadah') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            <span class="nav-link-text ms-1">Jadwal Ibadah</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('data-jemaat') ? 'active' : '') }}" href="{{ url('data-jemaat') }}">
          <i style="    font-size: 20px;" class="fas fa-lg fa fa-users	ps-2 pe-2 text-center text-dark {{ (Request::is('data-jemaat') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            <span class="nav-link-text ms-1">Data Jemaat</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('profile-pengurus') ? 'active' : '') }}" href="{{ url('profile-pengurus') }}">
          <i style="    font-size: 20px;" class="fas fa-lg fa fa-users ps-2 pe-2 text-center text-dark {{ (Request::is('profile-pengurus') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            <span class="nav-link-text ms-1">Data Pengurus</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('user-profile') ? 'active' : '') }} " href="{{ url('user-profile') }}">
          <i style="    font-size: 20px;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ (Request::is('user-profile') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            <span class="nav-link-text ms-1">User Profile</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('user-management') ? 'active' : '') }}" href="{{ url('user-management') }}">
                <i style="    font-size: 20px;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ (Request::is('user-management') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            <span class="nav-link-text ms-1">User Management</span>
        </a>
      </li>

    </ul>
  </div>

</aside>
