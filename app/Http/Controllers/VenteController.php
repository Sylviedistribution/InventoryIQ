<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{

    public function index()
    {
        $listeVentes = Vente::paginate(15);

        return view('vente-list', compact('listeVentes'));
    }

    public function create()
    {
        $listeProduits = Produit::all();
        return view('vente-make',compact('listeProduits'));
    }

    public function edit(Vente $v)
    {
        return view('vente-edit', compact('v'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomClient' => 'required|max:50',
            'telephone' => 'required|max:12',
            'produits_id' => 'required|array',
            'quantites' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        $position=0;
        foreach ($request->produits_id as $p_id) {
            $appro = Approvisionnement::where('produit_id', $p_id)->orderBy('datePeremption')->first();

            if ($appro) {
                $quantite = $request->quantites[$position];
                $qteAppro = $appro->quantiteRestante;
                $qteRest = $qteAppro - $quantite;

                if ($qteRest >= 0) {
                    $appro->quantiteRestante = $qteRest;
                    $appro->save();
                } else {
                    return redirect()->back()->withErrors(['quantite' => 'Quantité insuffisante pour le produit ']);
                }
            }

            $position++;
        }


        Vente::create([
            'nomClient' => $request->input('nomClient'),
            'telephone' => $request->input('telephone'),
            'produit' => json_encode($request->produits),
        ]);

        return redirect()->route("vente.list")->with('success', "La vente s'est bien déroulée.");
    }



}

