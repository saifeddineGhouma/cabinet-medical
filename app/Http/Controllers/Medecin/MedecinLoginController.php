<?php

namespace App\Http\Controllers\Medecin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medecin;
use Auth;
use Route;

class MedecinLoginController extends Controller
{
   
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout','create']]);
    }
    
    public function showLoginForm()
    {
      return view('Dashbord_medecin.medecin_login');
    }
    
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      
      // Attempt to log the user in
      if (Auth::guard('medecin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('medecin.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

     
    public function logout()
    {
        Auth::guard('medecin')->logout();
        return redirect('/medecin');
    }
}
