<?php

namespace App\Http\Controllers\Architecte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Architecte;
use Auth;
use Route;

class ArchitecteLoginController extends Controller
{
   
    public function __construct()
    {
      $this->middleware('guest:architecte', ['except' => ['logout']]);

    
    }
    
    public function showLoginForm()
    {
      return view('Dashbord_architecte.architecte_login');
    }
    
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      
      // Attempt to log the user in
      if (Auth::guard('architecte')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('architecte.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

     
    public function logout()
    {
        Auth::guard('architecte')->logout();
        return redirect('/architecte');
    }
}
