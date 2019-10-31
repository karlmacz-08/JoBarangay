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
      <a href="#" style="text-decoration: none;">
        @if($users->count() > 0)
          @foreach($users as $user)
            <div class="match-box box" style="margin-bottom: 10px" data-var-id="{{ $user->id }}">
              <article class="media">
                <div class="media-left">
                  <figure class="image is-64x64">
                    <img src="{{ asset($user->image !== null ? 'uploads/' . $user->image : '/images/avatar.png') }}">
                  </figure>
                </div>
                <div class="media-content">
                  <div class="content">
                    <div class="level" style="margin: 0; margin-bottom: -15px">
                      <div class="level-left">
                        <h4><strong>{{ $user->full_name() }}</strong></h4>
                      </div>
                      <div class="level-right">
                        <small>Matched {{ $user->created_at->diffForHumans() }}.</small>
                      </div>
                    </div>
                    <p style="margin: 0;">Contact Number: (+63) {{ substr($user->mobile_number, 0, 3) . '-' . substr($user->mobile_number, 3, 3) . '-' . substr($user->mobile_number, 6) }}</p>
                    <p>Address: {{ $user->address }}</p>
                  </div>
                </div>
              </article>
            </div>
          @endforeach
        @endif
      </a>
    </div>
  </div>
</div>
@endsection

@section('modals')
  <div id="match-modal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content"></div>
    </div>
  </div>
@endsection

@section('resources')
  <script>
    $(document).ready(function() {
      $('body').on('click', '.match-box', function() {
        $.ajax({
          url: '/api/user/' + $(this).attr('data-var-id'),
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method: 'POST',
          dataType: 'json',
          success: function(response) {
            console.log(response);
            if(response.status === 'ok') {
              if(response.data.type === 'Employer') {
                var list1 = '';

                if(response.data.list1.length > 0) {
                  for(var i = 0; i < response.data.list1.length; i++) {
                    list1 += '<li>' + response.data.list1[i] + '</li>';
                  }
                }

                $('#match-modal .modal-content').html('<div class="modal-header">\
                    <h3 class="col-12 modal-title text-center">Employer</h3>\
                  </div>\
                  <div class="modal-body">\
                    <div class="row">\
                      <div class="col-lg">\
                        <h1 class="display-4"><strong>' + response.data.fn + '</strong></h1>\
                        <p><strong>Kompanya:</strong> ' + response.data.company + '</p>\
                        <p><strong>Address:</strong> ' + response.data.address + '</p>\
                        <p><strong>Cellphone Number:</strong> ' + response.data.mobile_number + '</p>\
                        <p><strong>Mga Kinakailangan:</strong></p>\
                        <ul>' + list1 + '</ul>\
                      </div>\
                      <div class="col-lgt">\
                        <img src="' + (response.data.image !== null ? '/uploads/' + response.data.image : '/images/avatar.png') + '" alt="1x1pic" class="img-thumbnail rounded float-right mr-3" style="height: 200px;">\
                      </div>\
                    </div>\
                  </div>\
                  <div class="modal-footer p-2">\
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Isarado</button>\
                  </div>');
              } else if(response.data.type === 'Applicant') {
                var list1 = '';
                var list2 = '';

                if(response.data.list1.length > 0) {
                  for(var i = 0; i < response.data.list1.length; i++) {
                    list1 += '<li>' + response.data.list1[i] + '</li>';
                  }
                }

                if(response.data.list2.length > 0) {
                  for(var i = 0; i < response.data.list2.length; i++) {
                    list2 += '<li>' + response.data.list2[i] + '</li>';
                  }
                }

                $('#match-modal .modal-dialog').html('<div class="modal-header">\
                    <h3 class="col-12 modal-title text-center">Aplikante</h3>    \
                  </div>\
                  <div class="modal-body">\
                    <div class="row">\
                      <div class="col-lg">\
                        <h1 class="display-4"><strong>' + response.data.fn + '</strong></h1>\
                        <p><strong>Antas ng Edukasyon:</strong> ' + response.data.educational_attainment + '</p>\
                        <p><strong>Kaarawan:</strong> ' + response.data.birth_date + '</p>\
                        <p><strong>Cellphone Number:</strong> ' + response.data.mobile_number + '</p>\
                        <p><strong>Tirahan:</strong> ' + response.data.address + '</p>\
                        <p><strong>Clearance:</strong></p>\
                        <ul>' + list2 + '</ul>\
                        <p><strong>Kasanayan (Skills):</strong></p>\
                        <ul>' + list1 + '</ul>\
                      </div>\
                      <div class="col-lgt">\
                        <img src="' + (response.data.image !== null ? '/uploads/' + response.data.image : '/images/avatar.png') + '" alt="1x1pic" class="img-thumbnail rounded float-right mr-3" style="height: 200px;">\
                      </div>\
                    </div>\
                    <div class="modal-footer p-2">\
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Isarado</button>\
                    </div>\
                  </div>');
              }

              $('#match-modal').modal('show');
            }
          }
        });

        return false;
      });
    });
  </script>
@endsection
