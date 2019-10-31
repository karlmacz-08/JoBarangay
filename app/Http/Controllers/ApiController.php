<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Swipes;
use App\Users;

class ApiController extends Controller
{
  public function test()
  {
    return 'Ok';
  }
  
  /*
  * POST Requests
  */
  public function post_user($id)
  {
    $user = Users::where('id', $id)->first();

    $user->fn = $user->full_name();
    $user->list1 = [];

    if($user->skills->count() > 0) {
      foreach($user->skills as $skill) {
        $user->list1[] = $skill->skill->name;
      }
    }

    if($user->type === 'Applicants') {
      $user->list2 = [];

      if($user->clearances->count() > 0) {
        foreach($user->clearances as $clearance) {
          $user->list2[] = $clearance;
        }
      }
    }

    return response()->json([
      'status' => 'ok',
      'data' => $user
    ]);
  }

  public function post_applicants(Request $request)
  {
    $id = $request->input('id');

    $swipables = [];

    $applicants = Users::where('type', 'Applicant')->get();

    if($applicants->count() > 0) {
      foreach($applicants as $applicant) {
        if($applicant->swipe_by->count() > 0) {
          foreach($applicant->swipe_by as $swipe) {
            if($swipe->swiper_id != $id) {
              $applicant['fn'] = $applicant->full_name();
              $swipables[] = $applicant;
            }
          }
        } else {
          $applicant['fn'] = $applicant->full_name();
          $swipables[] = $applicant;
        }
      }
    }

    return response()->json($swipables);
  }

  public function post_employers(Request $request)
  {
    $id = $request->input('id');
    
    $swipables = [];

    $employers = Users::where('type', 'Employer')->get();

    if($employers->count() > 0) {
      foreach($employers as $employer) {
        if($employer->swipe_by->count() > 0) {
          foreach($employer->swipe_by as $swipe) {
            if($swipe->swiper_id != $id) {
              $employer['fn'] = $employer->full_name();
              $swipables[] = $employer;
            }
          }
        } else {
          $employer['fn'] = $employer->full_name();
          $swipables[] = $employer;
        }
      }
    }

    return response()->json($swipables);
  }

  public function post_swipe(Request $request)
  {
    $swiper_id = $request->input('swiper_id');
    $target_user_id = $request->input('target_user_id');

    $swipe = new Swipes;

    $swipe->swiper_id = $swiper_id;
    $swipe->target_user_id = $target_user_id;

    if($swipe->save()) {
      $match = Swipes::where('swiper_id', $target_user_id)->where('target_user_id', $swiper_id)->first();

      if($match !== null) {
        $response = [
          'status' => 'ok',
          'message' => 'It\'s a match!'
        ];
      } else {
        $response = [
          'status' => 'ok',
          'message' => 'Swipe successfully recorded.'
        ];
      }
    } else {
      $response = [
        'status' => 'fail',
        'message' => 'Failed to record swipe.'
      ];
    }

    return response()->json($response);
  }
}
