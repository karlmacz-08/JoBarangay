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
      <div class="swiper">
        <div class="swiper-tools">
          <a href="#" class="swiper-left">
            <span class="fas fa-chevron-left fa-fw"></span>
          </a>
          <a href="#" class="swiper-right">
            <span class="fas fa-chevron-right fa-fw"></span>
          </a>
        </div>
        <div id="swipable-cards" class="swiper-content"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('resources')
  @if(Auth::user()->type === 'Applicant')
    <script>var what = 'employers';</script>
  @elseif(Auth::user()->type === 'Employer')
    <script>var what = 'applicants';</script>
  @else
    <script>var what = null;</script>
  @endif
  <script>
    function loadSwipeCards() {
      if(what !== null) {
        $.ajax({
          url: '/api/' + what,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
          },
          method: 'POST',
          data: {
            id: '{{ Auth::user()->id }}'
          },
          dataType: 'json',
          success: function(response) {
            if(response.length > 0) {
              $('#swipable-cards').html('');

              for(var i = 0; i < response.length; i++) {
                $('#swipable-cards').append('<div class="card' + (i === 0 ? ' active' : '') + '">\
                    <div class="card-header justify-content-center">\
                      <h5 class="card-title display-4">RESUMÉ</h5>\
                    </div>\
                    <div class="card-body">\
                      <form class="container">\
                        <fieldset disabled>\
                          <div class="form-group row">\
                            <label for="colFormLabelmd" class="col-md-3 col-form-label col-form-label-md">BUONG PANGALAN</label>\
                            <div class="col-md-9">\
                              <input type="text" class="form-control form-control-md" id="colFormLabelmd" placeholder="">\
                            </div>\
                          </div>\
                          <div class="form-group row">\
                            <label for="colFormLabelmd" class="col-md-3 col-form-label col-form-label-md">KAARAWAN</label>\
                            <div class="col-md-9">\
                              <input type="text" class="form-control form-control-md" id="colFormLabelmd" placeholder="">\
                            </div>\
                          </div>\
                        </fieldset>\
                        <div class="form-group row">\
                          <label class="col-md-3 col-form-label col-form-label-md" for="eduklvl">ANTAS NG EDUKASYON</label>\
                            <div class="col-md-9 mt-2">\
                            <select class="custom-select" id="eduklvl">\
                              <option selected>...</option>\
                              <option value="1" >Elementary</option>\
                              <option value="2">High School</option>\
                              <option value="3">College</option>\
                              <option value="4">Wala sa nabanggit</option>\
                            </select>\
                          </div>\
                        </div>\
                        <div class="form-group row" id="degree">\
                          <label for="colFormLabelmd" class="col-md-3 col-form-label col-form-label-md">TINAPOS NA KURSO</label>\
                          <div class="col-md-9">\
                            <input type="text" class="form-control form-control-md" id="colFormLabelmd" placeholder="">\
                          </div>\
                        </div>\
                        <div class="row">\
                          <div class="col-md-3">\
                            <p>SKILLS:</p>\
                          </div>\
                          <div class="input-group col-md-9 mb-3">\
                            <input type="text" class="form-control" placeholder="KAKAYAHAN" aria-label="KAKAYAHAN" aria-describedby="KAKAYAHAN">\
                            <div class="input-group-append">\
                              <button class="btn btn-primary" type="button">MAGDAGDAG</button>\
                            </div>\
                          </div>\
                        </div>\
                      </form>\
                    </div>\
                  </div>');
              }
            }
          },
          error: function(arg0, arg1, arg2) {
            console.log(arg0.responseText);
          }
        });
      }
    }

    $(document).ready(function() {
      $(function() {
        loadSwipeCards();
      });

      $('body').on('click', '.swipe-right', function() {

      });
    });
  </script>
@endsection
