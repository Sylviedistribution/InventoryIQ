<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProduitController extends Controller
{
    public function index(){
        $listeProduits = Produit::paginate(15);

        return view('produit-list',compact('listeProduits'));
    }

    public function filter(Request $request){
        $listeProduits= Produit::filtre($request->libelle, $request->prixMin, $request->prixMax);
        return view('produit-list',compact('listeProduits'));
    }

    public function create(){

        return view('produit-add');
    }

    public function store(Request $request){
        Validator::make($request->all(),[
            'libelle'=> 'required|50',
            'description'=> 'required|50',
            'prix'=> 'required',
            'image'=> 'required',
        ]);

        $image = $request->image;

        if($image){
            $imagePath = $image->store('imageProduit','public');
        }else{
            return redirect()->back()->withErrors(['image'=>'Image non telecharger']);
        }

        Produit::create([
            'libelle'=>$request->libelle,
            'description'=>$request->description,
            'prix'=>$request->prix,
            'imagePath'=>$imagePath,
        ]);

        return redirect()->route("produit.list")->with('success','Le produit a bien été ajouté.');
    }

    public function edit(Produit $p){
        return view('produit-edit',compact('p'));
    }

    public function update(Request $request, $produit){
        Validator::make($request->all(),[
            'libelle'=> 'required|50',
            'description'=> 'required|50',
            'prix'=> 'required',
            'image'=> 'required',
        ]);

        $image = $request->image;

        if($image){
            $imagePath = $image->store('imageProduit','public');
        }else{
            return redirect()->back()->withErrors(['image'=>'Image non telecharger']);
        }

        // Mettre à jour le post avec les données validées
        $produit->update([
            'titre' => $request->libelle,
            'categorie'=> $request->description,
            'prix' => $request->prix,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('produit.list',auth()->user())->with('success', "L'article a bien été modifié");
    }

    public function delete(Produit $p){
        $p->delete();
        return to_route('produit.list');

    }
}
