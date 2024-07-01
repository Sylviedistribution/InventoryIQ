<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function filtre($libelle = null, $prixMin = null, $prixMax = null)
    {
        if ($libelle && $prixMin && $prixMax) {
            $listeProduits = Produit::where('libelle', 'like', '%' . $libelle . '%')
                ->where('prix', '>=', $prixMin)
                ->where('prix', '<=', $prixMax)->paginate(10);
        } else if ($libelle && $prixMin) {
            $listeProduits = Produit::where('libelle', 'like', '%' . $libelle . '%')
                ->where('prix', '>=', $prixMin)->paginate(10);
        } else if ($libelle && $prixMax) {
            $listeProduits = Produit::where('libelle', 'like', '%' . $libelle . '%')->where('prix', '<=', $prixMax)->paginate(10);
        } else if ($prixMin && $prixMax) {
            $listeProduits = Produit::where('prix', '>=', $prixMin)->where('prix', '<=', $prixMax)->paginate(10);
        } else if ($libelle) {
            $listeProduits = Produit::where('libelle', 'like', '%' . $libelle . '%')->paginate(10);
        } else if ($prixMin) {
            $listeProduits = Produit::where('prix', '>=', $prixMin)->paginate(10);
        } else if ($prixMax) {
            $listeProduits = Produit::where('prix', '<=', $prixMax)->paginate(10);
        } else {
            $listeProduits = Produit::paginate(10);
        }

        return $listeProduits;
    }

    public function fourniseur()
    {
        return $this->hasOne(Fournisseur::class);
    }

    public function imageUrl()
    {
        return Storage::url($this->imagePath);
    }
}
