<?php

namespace App\Http\Controllers\Auth;

// use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        $page = Page::where('slug', 'login-page')->firstOrFail();
        return view('auth.login', [
            'page' => $page
        ]);
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() {
        // echo "<pre>";
      // $role = get_class_methods(Auth::user()); 
        // echo "</pre>";
      // var_dump($role);
      // die();
      // $role = Auth::user();
      /*var_dump($role);
      die();*/


      // hasRole('writer')

      if(Auth::user()->hasRole('admin')) {
        return '/admin_panel';
      }

      if(Auth::user()->hasRole('user')) {
        return '/partner_panel';
      }

      return RouteServiceProvider::HOME;


      /*switch ($role) {
        case 'admin':
          return '/admin_panel';
          break;
        case 'user':
          return '/partner_panel';
          break; 

        default:
          return '/'; 
        break;
      }*/
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
