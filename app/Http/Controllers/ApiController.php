<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;

class ApiController extends Controller
{
    public function applicants()
    {
      $applicants = Users::where('type', 'Applicants')->get();

      return response()->json($applicants);
    }

    public function employers()
    {
      $employers = Users::where('type', 'Employer')->get();

      return response()->json($employers);
    }

    /*
    * POST Requests
    */
    public function post_swipe(Request $request)
    {
      $swiper_id = $request->input('swiper_id');
      $target_user_id = $request->input('target_user_id');
      $action = $request->input('action');

      $swipe = new Swipes;

      $swipe->swiper_id = $swiper_id;
      $swipe->target_user_id = $target_user_id;
      $swipe->action = $action;

      if($swipe->save()) {
        $match = Swipes::where('swiper_id', $swiper_id)->where('target_user_id', $swiper_id)->first();

        if($swipe !== null) {
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
