<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Auth;

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
    return view('dashboard.matches');
  }

  public function resume()
  {
    $id = auth()->user()->id;
    $user_info = Users::find($id);

    return view('dashboard.resume', [
      'user_info' => $user_info,
    ]);
  }
}
