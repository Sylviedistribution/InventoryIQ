@extends('layouts.app-model')

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="text center">
                <h4 class="text-blue h4">Modifier un produit</h4>
            </div>
        </div>
        <form method="POST" action="{{route("produit.update",$p)}}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Libelle</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror"
                           value="{{old('libelle',$p->libelle)}}">
                    @error('libelle')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="description" rows="2"
                              class="form-control @error('description') is-invalid @enderror">
                        {{old('description',$p->description)}}
                   </textarea>
                    @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Prix</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="prix" class="form-control @error('prix') is-invalid @enderror"
                           value="{{old('prix',$p->prix)}}">
                    @error('prix')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Image</label>
                <div class="col-sm-12 col-md-10">
                    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)"
                           class="@error('image') is-invalid @enderror" value="{{old('libelle',$p->libelle)}}"><br>
                    @error('image')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <img id="preview" src="{{$produit->imageUrl()}}" alt="Aperçu de l'image"
                         style="width: 500px; height: 500px;"><br><br></div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>s
@endsection
