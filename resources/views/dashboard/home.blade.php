@extends('layouts.dashboard')

@section('content')
  <div class="dashboard">
    <div class="dashboard-sidebar">
      @include('partials.dashboard.sidebar')
      <div class="dashboard-sidebar-bottom">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="logout-button nav-link" href="#">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="dashboard-content">
      <div class="dashboard-content-inner">
      </div>
    </div>
  </div>
@endsection
