<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Storage;

use App\Clearances;
use App\Users;
use App\Skills;
use App\Skillsets;

class DashboardController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function home()
  {
    return view('dashboard.home');
  }

  public function matches()
  {
    $users = null;

    if(Auth::user()->type === 'Applicant') {
      $users = Users::where('type', 'Employer')->get();
    } else if(Auth::user()->type === 'Employer') {
      $users = Users::where('type', 'Applicant')->get();
    }

    return view('dashboard.matches', [
      'users' => $users
    ]);
  }

  public function resume()
  {
    $skills = Skills::get();

    return view('dashboard.resume', [
      'skills' => $skills
    ]);
  }

  /*
  * POST Requests
  */
  public function post_update_resume(Request $request)
  {
    $id = $request->input('id');
    $address = $request->input('address', null);
    $educational_attainment = $request->input('educational_attainment');
    $degree = $request->input('degree', null);
    $skills = $request->input('skills');
    $clearances = $request->input('clearances', null);
    $image = $request->file('image');

    $new_image = Storage::disk('main')->putFile('/', $image);

    if($new_image !== null) {
      $user = Users::where('id', $id)->update([
        'address' => $address,
        'educational_attainment' => $educational_attainment,
        'degree' => $degree,
        'image' => basename($new_image)
      ]);

      if($user !== null) {
        if(count($skills) > 0) {
          Skillsets::where('user_id', $id)->delete();

          foreach($skills as $skill) {
            Skillsets::insert([
              'user_id' => $id,
              'skill_id' => $skill
            ]);
          }
        }

        // if(count($clearances) > 0) {
        //   foreach($clearances as $clearance) {
        //     if($clearance != null && $clearance != '') {
        //       Clearances::insert([
        //         'user_id' => $id,
        //         'name' => $clearance
        //       ]);
        //     }
        //   }
        // }

        session()->flash('flash_status', 'ok');
        session()->flash('flash_message', 'Resume has been updated.');
      } else {
        session()->flash('flash_status', 'fail');
        session()->flash('flash_message', 'Failed to update resume.');
      }
    } else {
      session()->flash('flash_status', 'fail');
      session()->flash('flash_message', 'Failed to upload image.');
    }

    return redirect()->back();
  }
}
