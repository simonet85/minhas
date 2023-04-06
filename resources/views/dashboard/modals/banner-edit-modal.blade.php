<div class="modal fade" id="edit-{{$homeBanner->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier la Banniére</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-auto">
                <!-- General Form Elements -->
                <form method="POST" action="{{route("homebanner.update", $homeBanner->id)}}" class="g-3  was-validated" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Titre</label>
                            <input type="text" name="title" value="{{$homeBanner->title}}" class="form-control @error('title') is-invalid @enderror" placeholder="Ex: Bienvenue l'association des droits ...." required>

                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Slogan</label>
                            <input type="text" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ $homeBanner->slogan}}" placeholder="Ex: Travailler ensemble pour l'égalité des ..." required>

                            @error('slogan')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Bouton d'appel à l'action</label>
                            <input type="text" name="button" value="{{$homeBanner->button}}" class="form-control @error('button') is-invalid @enderror" placeholder="Ex: Devenir Membre" required>

                            @error('button')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-sm-12">
                            <img id="imagePreview" src="{{asset('storage/banners/'.$homeBanner->file)}}" alt="">
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-sm-12">
                            <label for="inputNumber" class=" col-form-label">Téléserver Fichier</label>
                            <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file" required>

                            @error('file')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-white" data-bs-dismiss="modal">
                    Fermer
                </button>

                <button type="submit" class="btn btn-danger">Modifier</button>
            </div>
            </form>
        </div>
    </div>
</div>
