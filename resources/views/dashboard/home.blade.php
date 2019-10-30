@extends('layouts.dashboard')

@section('content')
  <div class="dashboard">
    <div class="dashboard-sidebar">
      @yield('partials.dashboard.sidebar')
    </div>
    <div class="dashboard-content">
      <div class="navbar">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">{{ Auth::user()->full_name() }}</a>
              <div class="dropdown-menu">
                <a class="logout-button dropdown-item" href="#">Log Out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="dashboard-content-inner"></div>
    </div>
  </div>
@endsection
