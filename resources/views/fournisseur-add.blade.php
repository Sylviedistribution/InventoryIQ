@extends('layouts.app-model')

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="text center">
                <h4 class="text-blue h4">Ajouter un fournisseur</h4>
            </div>
        </div>
        <form method="POST" action="{{route("fournisseur.store")}}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Nom</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror">
                    @error('nom')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror">
                    @error('telephone')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Adresse</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror">
                    @error('adresse')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
