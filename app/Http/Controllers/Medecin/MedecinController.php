<?php

namespace App\Http\Controllers\Medecin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedecinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:medecin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashbord_medecin.home');
    }
}