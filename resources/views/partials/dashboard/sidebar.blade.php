<ul class="nav flex-column">
  <li class="nav-item">
    <div class="profile">
      <img src="{{ asset('images/avatar.png') }}" class="profile-img">
      <div class="profile-name">{{ Auth::user()->full_name() }}</div>
      <div class="profile-type">{{ Auth::user()->type }}</div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" @if(Request::is('dashboard/home')) style="color: black" @endif href="{{ route('dashboard.home') }}">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" @if(Request::is('dashboard/matches')) style="color: black" @endif href="{{ route('dashboard.matches') }}">Matches</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" @if(Request::is('dashboard/resume')) style="color: black" @endif href="{{ route('dashboard.resume') }}">Resume</a>
  </li>
</ul>
