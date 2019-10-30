@extends('layouts.dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}">
@endsection

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
			@foreach()
			<a href="#" style="text-decoration: none;">
				<div class="box" style="margin-bottom: 10px">
					<article class="media">
						<div class="media-left">
							<figure class="image is-64x64">
								<img src="{{ asset('images/avatar.png') }}" alt="">
							</figure>
						</div>
						<div class="media-content">
							<div class="content">
								<div class="level" style="margin: 0; margin-bottom: -15px">
									<div class="level-left">
										<h4><strong>Full Name</strong></h4>
									</div>
									<div class="level-right">
										<small>1 hr</small>
									</div>
								</div>
								<p style="margin: 0;">Contact Number: 0906 XXX XXXX</p>
								<p>Address: QC</p>
							</div>
						</div>
					</article>
				</div>
			</a>
		</div>
	</div>
</div>
@endsection