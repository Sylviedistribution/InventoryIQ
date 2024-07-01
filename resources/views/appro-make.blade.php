@extends('layouts.app-model')

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="text center">
                <h4 class="text-blue h4">Faire un approvisionnement</h4>
            </div>
        </div>
        <form method="POST" action="{{route("appro.store")}}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Nom</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="nomAppro" class="form-control @error('nomAppro') is-invalid @enderror">
                    @error('nomAppro')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Produit</label>
                <div class="col-sm-12 col-md-10">
                    <select type="text" name="produit_id" class="form-control @error('produit') is-invalid @enderror">
                        <option>Choisir un produit</option>
                        @foreach($listeProduits as $p)
                            <option value="{{$p->id}}">{{$p->libelle}}</option>
                        @endforeach
                    </select>
                    @error('produit')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Fournisseur</label>
                <div class="col-sm-12 col-md-10">
                    <select type="text" name="fournisseur_id"
                            class="form-control @error('fournisseur') is-invalid @enderror">
                        <option>Choisir un fournisseur</option>
                        @foreach($listeFournisseurs as $f)
                            <option value="{{$f->id}}">{{$f->nom}}</option>
                        @endforeach
                    </select>
                    @error('fournisseur')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Quantite</label>
                <div class="col-sm-12 col-md-10">
                    <input type="number" min="1" name="quantite"
                           class="form-control @error('quantite') is-invalid @enderror">
                    @error('quantite')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Date de péremption</label>
                <div class="col-sm-12 col-md-10">
                    <input type="date" name="datePeremption"
                           class="form-control @error('datePeremption') is-invalid @enderror">
                    @error('datePeremption')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        <div>
            <button type="submit" class="btn btn-success">Valider</button>
        </div>
        </form>
    </div>
@endsection
