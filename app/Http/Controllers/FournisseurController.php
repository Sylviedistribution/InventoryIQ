<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FournisseurController extends Controller
{
    public function index(){
        $listeFournisseurs = Fournisseur::paginate(15);

        return view('fournisseur-list',compact('listeFournisseurs'));
    }


    public function create(){

        return view('fournisseur-add');
    }

    public function store(Request $request){
        Validator::make($request->all(),[
            'nom'=> 'required|50',
            'email'=> 'required|email',
            'telephone'=> 'required',
            'adresse'=> 'required',
        ]);


        Fournisseur::create([
            'nom'=>$request->nom,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
            'adresse'=>$request->adresse,
        ]);

        return redirect()->route("fournisseur.list")->with('success','Le fournisseur a bien été ajouté.');
    }

    public function edit(Fournisseur $p){
        return view('fournisseur-edit',compact('p'));
    }

    public function update(Request $request, $fournisseur){
        Validator::make($request->all(),[
            'nom'=> 'required|50',
            'email'=> 'required|email',
            'telephone'=> 'required',
            'adresse'=> 'required',
        ]);

        // Mettre à jour le post avec les données validées
        $fournisseur->update([
            'nom' => $request->nom,
            'email'=> $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('fournisseur.list',auth()->user())->with('success', "Le fournisseur a bien été modifié");
    }

    public function delete(Fournisseur $f){
        $f->delete();
        return to_route('fournisseur.list');

    }
}
