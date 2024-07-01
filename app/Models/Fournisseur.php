<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function produit(){
        return $this->hasMany(Produit::class);
    }

    public function approvisionnement(){
        return $this->hasMany(Approvisionnement::class);
    }
}
