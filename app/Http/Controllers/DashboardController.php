<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Users;

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
    return view('dashboard.resume');
  }
}
