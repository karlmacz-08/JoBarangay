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
            <span class="fas fa-times fa-2x fa-fw"></span>
          </a>
          <a href="#" class="swiper-right">
            <span class="fas fa-check fa-2x fa-fw"></span>
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
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                $('#swipable-cards').append('<div class="swiper-item' + (i === 0 ? ' active' : '') + '" data-var-id="' + response[i].id + '">\
                    <div class="card">\
                      <div class="card-body">\
                        <div class="profiler">\
                          <img src="' + (response[i].image != null && response[i].image != '' ? '/uploads/' + response[i].image : '/images/avatar.png') + '" class="profiler-img">\
                          <div class="profiler-content">\
                            <h3 class="my-0">' + response[i].fn + '</h3>\
                            <h6 class="mt-0">' + response[i].company + '</h6>\
                          </div>\
                        </div>\
                        <div class="text-justify">\
                          <h5>Looking for:</h5>\
                          <ul>\
                            <li>Test</li>\
                          </ul>\
                        </div>\
                      </div>\
                    </div>\
                  </div>');
              }
            }
          }
        });
      }
    }

    $(document).ready(function() {
      $(function() {
        loadSwipeCards();
      });

      $('body').on('click', '.swiper-left', function() {
        var swiper = $(this).closest('.swiper');
        var targetElement = swiper.find('.swiper-item.active');

        targetElement.remove();
        swiper.find('.swiper-item').eq(0).addClass('active');

        return false;
      });

      $('body').on('click', '.swiper-right', function() {
        var swiper = $(this).closest('.swiper');
        var targetElement = swiper.find('.swiper-item.active');

        console.log(targetElement.attr('data-var-id'));

        $.ajax({
          url: '/api/swipe',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method: 'POST',
          data: {
            swiper_id: '{{ Auth::user()->id }}',
            target_user_id: targetElement.attr('data-var-id')
          },
          dataType: 'json',
          success: function(response) {
            console.log(response);

            if(response.status === 'ok') {
              if(response.message === 'It\'s a match!') {
                Swal.fire(
                  'Congratulations!',
                  response.message,
                  'success'
                );
              }

              targetElement.remove();
              swiper.find('.swiper-item').eq(0).addClass('active');
            }
          }
        });

        return false;
      });
    });
  </script>
@endsection
