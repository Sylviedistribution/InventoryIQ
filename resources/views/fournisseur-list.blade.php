@extends('layouts.app-model')

@section('content')
    <h2>Liste des Fournisseurs</h2>
    <div class="row float-right mr-10">

        <a href="{{route('fournisseur.create')}} " class="btn btn-primary">
            <i class="fas fa-shopping-bag"></i> Ajouter un fournisseur
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Adresse</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($listeFournisseurs as $f)
                <tr>
                    <td>{{$f->id}}</td>
                    <td>{{$f->nom}}</td>
                    <td>{{$f->email}}</td>
                    <td>{{$f->telephone}}</td>
                    <td>{{$f->adresse}}</td>
                    <td>
                        <a href="{{ route('fournisseur.delete', $f) }}" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @empty

            @endforelse
            </tbody>
        </table>
    </div>
    {{ $listeFournisseurs->links('vendor.pagination.bootstrap-5') }}

@endsection
