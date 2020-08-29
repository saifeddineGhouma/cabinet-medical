<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enseignant ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth ;
use App\Matiere;
use App\Niveau;
use App\Cour ;

class EnseignantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:enseignant', ['except' => ['post']]);
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('Enseignant.enseignant');
    }
    public function cours()
    {
        $enseignant=Auth::guard('enseignant')->user()->id ;
        $cours=Cour::where('enseignant_id',$enseignant)->paginate(10);
        return view('Enseignant.cours.index',compact('cours'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function post(Request $request)
    {
        //dd($request->all());
        $enseignant= Enseignant::create([
            'name' => $request->nom,
            'lastname' => $request->prenom,
            'tel' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::guard('enseignant')->login($enseignant);
        return     redirect('/enseignant');


    }
    public function createCours(){
        $matieres=Matiere::all();
        $niveaux =Niveau::all();
        return view ('Enseignant.Cours.create',compact('matieres','niveaux'));
    }
    public function postCours(Request $request)
    {
        $cour=new Cour();
        $cour->name=$request->name;
        $cour->description=$request->description;
        $cour->niveau_id=$request->niveau;
        $cour->matiere_id=$request->matiere;
        $cour->enseignant_id=Auth::guard('enseignant')->user()->id;
        
        $niveau=Niveau::where('id',$request->niveau)->first();
        $matiere=Matiere::where('id',$request->matiere)->first();


        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = str_slug($request->name.'-'.$matiere->name.'-'.$niveau->name).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/cours');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $cour->file = $name;
          }



      //  $cour->file="file";
        $cour->save();
        return redirect('/enseignant')->with('message', 'Cour cree avec  success!');

      //  return "success";

    }
    public function editCour($id)
    {
        $matieres=Matiere::all();
        $niveaux =Niveau::all();
        $cour=Cour::find($id);
        return view('Enseignant.cours.edit',compact('cour','matieres','niveaux'));
    }


    public function postEditCours(Request $request,$id)
    {
        $cour=Cour::find($id);
        $cour->name=$request->name;
        $cour->description=$request->description;
        $cour->niveau_id=$request->niveau;
        $cour->matiere_id=$request->matiere;
        $cour->enseignant_id=Auth::guard('enseignant')->user()->id;
        
        $niveau=Niveau::where('id',$request->niveau)->first();
        $matiere=Matiere::where('id',$request->matiere)->first();


        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = str_slug($request->name.'-'.$matiere->name.'-'.$niveau->name).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/cours');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $cour->file = $name;
          }



      //  $cour->file="file";
        $cour->save();
        return redirect('/enseignant')->with('message', 'Cour cree avec  success!');

      //  return "success";

    }



    public function deleteCours($id)
    {
      $cour= Cour::find($id);
      $cour->delete();
      
        return back();
    }
}
