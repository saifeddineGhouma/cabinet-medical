<?php

namespace App\Http\Controllers\Architecte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchitecteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:architecte');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('Dashbord_architecte.home');
    }
}