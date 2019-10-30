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
			<div class="card">
				<div class="container" style="margin-top: 20px">
					<form>
						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
									<label for="name">Buong Pangalan:</label>
									<input id="name" class="form-control" type="text" value="Eloquent" readonly>
								</div>

								<div class="form-group">
									<label for="mobile">Cellphone Number:</label>
									<input id="mobile" class="form-control" type="number" value="Eloquent" readonly>
								</div>

								<div class="form-group">
									<label for="birth">Kaarawan:</label>
									<input id="birth" class="form-control" type="text" value="Eloquent" readonly>
								</div>

								<div class="form-group">
									<label for="add">Tirahan:</label>
									<textarea id="add" class="form-control" name="address" cols="30" rows="2"></textarea>
								</div>

								<div class="form-group">
									<label for="educ">Antas ng Edukasyon:</label>
									<select class="custom-select" id="eduklvl">
										<option selected value="0">...</option>
										<option value="1" >Elementary</option>
										<option value="2">Hayskul</option>
										<option value="3">Kolehiyo</option>
										<option value="4">Wala sa nabanggit</option>
									</select>
								</div>

								<div class="form-group" id="degree">
									<label for="deg">Tinapos na Kurso</label>
									<input type="text" class="form-control" id="deg" placeholder="">
								</div>

								<div class="form-group">
									<label for="skills">Kasanayan (Skills):</label>
									<input id="skills" class="form-control" type="text" name="skills" value="">
								</div>
							</div>
							<div class="col-sm-4">
								<img class="img-thumbnail" src="{{ asset('images/avatar.png') }}" alt="Profile Picture">
								<div id="upload-file" class="file has-name is-centered is-boxed" style="margin-top: 10px; margin-bottom: 40px">
									<label class="file-label">
										<input class="file-input" type="file" name="image">
										<span class="file-cta">
											<span class="file-icon">
												<i class="fas fa-upload"></i>
											</span>
											<span class="file-label">
												Pumili ng isang file...
											</span>
										</span>
										<span class="file-name">
											Walang nai-upload na file.
										</span>
									</label>
								</div>
								<button class="btn btn-block btn-primary">Ipasa</button>
								<a class="btn btn-block btn-danger" style="color: white">Kanselahin</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/resume.js') }}"></script>
@endsection