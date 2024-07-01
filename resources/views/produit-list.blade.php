@extends('layouts.app-model')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div>
        <form method="GET" action="{{route("produit.filter")}}">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="libelle">Libelle:</label>
                    <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Nom" value="{{ request()->get('libelle', '') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="prixMin">Prix minimum:</label>
                    <input type="number" class="form-control" id="prixMin" name="prixMin" placeholder="Min" value="{{ request()->get('prixMin', '') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="prixMax">Prix maximum:</label>
                    <input type="number" class="form-control" id="prixMax" name="prixMax" placeholder="Max" value="{{ request()->get('prixMax', '') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>
    </div>
    <h2>Liste des Produits</h2>
    <div class="row float-right mr-10">
        <a href="{{route('produit.list')}} " class="btn btn-primary">
            <i class="fas fa-shopping-bag"></i> Ajouter un produit
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Libelle</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($listeProduits as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->libelle}}</td>
                    <td>{{$p->description}}</td>
                    <td>{{$p->prix}}</td>
                    <td>
                        <img src="{{$p->imageUrl()}}" alt="image" style="width: 50px; height: 50px"/>
                    </td>
                    <td>
                        <a href="{{ route('produit.edit', $p) }}" class="btn btn-warning">
                            <i class="fas fa-book"></i>
                        </a>
                        <a href="{{ route('produit.delete', $p) }}" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @empty

            @endforelse
            </tbody>
        </table>
    </div>
    {{ $listeProduits->links('vendor.pagination.bootstrap-5') }}

@endsection
