@extends('layouts.app-model')

@section('content')
    <div>
        <form method="GET"
              action="{{route("appro.filter")}}">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="libelle">Libelle:</label>
                    <input type="text" class="form-control" id="libelle" name="libelle" value="{{ request()->get('libelle', '') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="fournisseur">Fournisseur:</label>
                    <input type="text" class="form-control" id="fournisseur" name="fournisseur" value="{{ request()->get('fournisseur', '') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="datePeremtion">Date péremption :</label>
                    <input type="date" class="form-control" id="datePeremtion" name="datePeremtion" value="{{ request()->get('datePeremption', '') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>
    </div>
    <h2>Liste des Approvionnement</h2>
    <div class="row float-right mr-10">

        <a href="{{route('appro.create')}} " class="btn btn-primary">
            <i class="fas fa-shopping-bag"></i> Faire un approvisionnement
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Produit</th>
                <th scope="col">Fournisseur</th>
                <th scope="col">Quantite</th>
                <th scope="col">Quantite Restante</th>
                <th scope="col">Date de péremption</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($listeAppros as $a)
                <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->produit}}</td>
                    <td>{{$a->fournisseur}}</td>
                    <td>{{$a->quantite}}</td>
                    <td>{{$a->quantiteRestante}}</td>
                    <td>{{$a->datePeremption}}</td>
                    <td>
                        <a href="{{ route('appro.delete', $a) }}" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @empty

            @endforelse
            </tbody>
        </table>
    </div>
    {{ $listeAppros->links('vendor.pagination.bootstrap-5') }}

@endsection
