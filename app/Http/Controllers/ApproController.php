<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Fournisseur;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApproController extends Controller
{

    public function index()
    {
        $listeAppros = Approvisionnement::paginate(15);

        return view('appro-list', compact('listeAppros'));
    }

    public function filter(Request $request)
    {
        $listeAppros = Approvisionnement::filtre($request->produit, $request->fournisseur, $request->datePeremption);
        return view('appro-list', compact('listeAppros'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nomAppro' => 'required|50',
            'produit_id' => 'required',
            'fournisseur_id' => 'required',
            'quantite' => 'required',
            'datePeremption' => 'required',
        ]);

        //La méthode pluck permet de récupérer une collection contenant uniquement les valeurs d'un champ spécifique.
        $produitLibelle = Produit::where('id', $request->produit_id)->pluck('libelle')->first();
        $fournisseurNom = Fournisseur::where('id', $request->fournisseur_id)->pluck('nom')->first();


        Approvisionnement::create([
            'nomAppro' => $request->nomAppro,
            'produit' => $produitLibelle,
            'fournisseur' => $fournisseurNom,
            'quantite' => $request->quantite,
            'quantiteRestante' => $request->quantite,
            'datePeremption' => $request->datePeremption,
            'produit_id' => $request->produit_id,
            'fournisseur_id' => $request->fournisseur_id
        ]);

        return redirect()->route("appro.list")->with('success', "L'approvisionnement a bien été effectué.");
    }

    public function create()
    {

        $listeProduits = Produit::all();
        $listeFournisseurs = Fournisseur::all();
        return view('appro-make', compact('listeProduits', 'listeFournisseurs'));
    }

    public function delete(Approvisionnement $a)
    {
        $a->delete();
        return view('appro-list');

    }
}
