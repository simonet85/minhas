<div class="modal fade" id="edit-{{$homeSection->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog  modal-dialog-scrollable">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Modifier la Section</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <!-- General Form Elements -->
                <form method="POST" action="{{route("homesections.update", $homeSection->id)}}" class="g-3" enctype="multipart/form-data" novalidate>

                    @method("PUT")
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Titre</label>
                            <input type="text" name="title" value="{{$homeSection->title}}" class="form-control @error('title') is-invalid @enderror" placeholder="Ex: Bienvenue l'association des droits ...." required>

                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Texte</label>
                            <textarea name="text" id="editor-{{$homeSection->id}}" cols="30" rows="10" class="form-control" required>{!! $homeSection->text!!}</textarea>
                            {{-- <input type="text" class="form-control @error('slogan') is-invalid @enderror" name="text" value="{{ $homeSection->text}}" placeholder="Ex: Travailler ensemble pour l'égalité des ..." required> --}}

                            @error('text')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <script>
                            ClassicEditor
                                .create(document.querySelector(`#editor-{{$homeSection->id}}`))
                                .catch(error => {
                                    console.error(error);
                                });

                        </script>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Bouton d'appel à l'action</label>
                            <input type="text" name="button" value="{{$homeSection->button}}" class="form-control @error('button') is-invalid @enderror" placeholder="Ex: Devenir Membre">

                            @error('button')
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
