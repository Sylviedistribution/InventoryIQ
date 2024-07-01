<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approvisionnement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function filtre($produit = null, $fournisseur = null, $datePeremption = null)
    {
        if ($produit && $fournisseur && $datePeremption) {
            $listeAppros = Approvisionnement::where('produit', 'like', '%' . $produit . '%')
                ->where('fournisseur', 'like', '%' . $fournisseur . '%')
                ->where('datePeremption', '>=', $datePeremption)->paginate(10);
        } else if ($produit && $fournisseur) {
            $listeAppros = Approvisionnement::where('produit', 'like', '%' . $produit . '%')
                ->where('fournisseur', 'like', '%' . $fournisseur . '%')->paginate(10);
        } else if ($produit && $datePeremption) {
            $listeAppros = Approvisionnement::where('produit', 'like', '%' . $produit . '%')->where('datePeremption', '>=', $datePeremption)->paginate(10);
        } else if ($fournisseur && $datePeremption) {
            $listeAppros = Approvisionnement::where('fournisseur', 'like', '%' . $fournisseur . '%')->where('datePeremption', '>=', $datePeremption)->paginate(10);
        } else if ($produit) {
            $listeAppros = Approvisionnement::where('produit', 'like', '%' . $produit . '%')->paginate(10);
        } else if ($fournisseur) {
            $listeAppros = Approvisionnement::where('fournisseur', 'like', '%' . $fournisseur . '%')->paginate(10);
        } else if ($datePeremption) {
            $listeAppros = Approvisionnement::where('datePeremption', '<=', $datePeremption)->paginate(10);
        } else {
            $listeAppros = Approvisionnement::paginate(10);
        }
        return $listeAppros;
    }

    public function fourniseur()
    {
        return $this->hasOne(Fournisseur::class);
    }
}
