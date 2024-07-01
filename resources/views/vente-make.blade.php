@extends('layouts.app-model')

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Enregistrer une vente</h4>
            </div>
        </div>
        <form method="POST" action="{{route("vente.store")}}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Nom Client</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="nomClient" placeholder="" class="form-control @error('nomClient') is-invalid @enderror">
                    @error('nomClient')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Téléphone</label>
                <div class="col-sm-12 col-md-10">
                    <input name="telephone" type="tel" class="form-control @error('telephone') is-invalid @enderror">
                    @error('telephone')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div id="products-container">
                <div class="form-group row product-item">
                    <label class="col-sm-12 col-md-2 col-form-label">Produit</label>
                    <div class="col-sm-12 col-md-4">
                        <select name="produits_id[]" class="custom-select col-12 @error('produits.*') is-invalid @enderror">
                            <option value="">Choisir un produit</option>
                            @foreach($listeProduits as $p)
                                <option value="{{ $p->id }}">{{ $p->libelle }}</option>
                            @endforeach
                        </select>
                        @error('produits.*')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <label class="col-sm-12 col-md-2 col-form-label">Quantité</label>
                    <div class="col-sm-12 col-md-2">
                        <input name="quantites[]" type="number" min="1" class="form-control @error('quantites.*') is-invalid @enderror">
                        @error('quantites.*')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <button type="button" class="btn btn-danger remove-product">Supprimer</button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="add-product">Ajouter un produit</button>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Valider la vente</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Stockez le modèle de produit HTML
            let productTemplate = `
                <div class="form-group row product-item">
                    <label class="col-sm-12 col-md-2 col-form-label">Produit</label>
                    <div class="col-sm-12 col-md-4">
                        <select name="produits[]" class="custom-select col-12">
                            <option value="">Choisir un produit</option>
                            @foreach($listeProduits as $p)
            <option value="{{ $p->id }}">{{ $p->libelle }}</option>
                            @endforeach
            </select>
        </div>
        <label class="col-sm-12 col-md-2 col-form-label">Quantité</label>
        <div class="col-sm-12 col-md-2">
            <input name="quantites[]" type="number" min="1" class="form-control">
        </div>
        <div class="col-sm-12 col-md-2">
            <button type="button" class="btn btn-danger remove-product">Supprimer</button>
        </div>
    </div>`;

            // Ajouter un produit lors du clic sur le bouton
            $('#add-product').click(function() {
                $('#products-container').append(productTemplate);
            });

            // Supprimer un produit lors du clic sur le bouton "Supprimer"
            $(document).on('click', '.remove-product', function() {
                $(this).closest('.product-item').remove();
            });
        });
    </script>
@endsection
