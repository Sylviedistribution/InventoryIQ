@extends('layouts.app-model')

@section('content')
<h2>Liste des Postes</h2>
<div class="row float-right mr-10">

    <a href="{{route('vente.create')}} " class="btn btn-primary px-3">
        <i class="fas fa-dollar"></i> Faire une vente
    </a>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom Client</th>
            <th scope="col">Telephone</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($listeVentes as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->nomClient}}</td>
                <td>{{$v->telephone}}</td>
                <td>
                    <a href="{{ route('vente.show', $v) }}" class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
        @empty

        @endforelse
        </tbody>
    </table>
</div>
@endsection
