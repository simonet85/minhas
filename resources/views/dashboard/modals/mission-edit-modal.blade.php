<div class="modal fade" id="edit-{{$missionObjectif->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <form method="POST" action="{{route('missionobjectif.update', $missionObjectif->id)}}" class="g-3" enctype="multipart/form-data" novalidate>

                    @method("PUT")
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Titre</label>
                            <input type="text" name="title" value="{{$missionObjectif->title}}" class="form-control @error('title') is-invalid @enderror" placeholder="Ex: Bienvenue l'association des droits ...." required>

                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Description</label>
                            <textarea id="desc-{{$missionObjectif->id}}" name="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ $missionObjectif->description }}</textarea>

                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <script>
                            ClassicEditor
                                .create(document.querySelector(`#desc-{{ $missionObjectif->id }}`))
                                .catch(error => {
                                    console.error(error);
                                });

                        </script>

                    </div>


                    <div class="row mb-3 ">
                        <div class="col-sm-12">
                            <img id="imagePreview" src="{{asset('storage/missions/'.$missionObjectif->image)}}" alt="">
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-sm-12">
                            <label for="inputNumber" class=" col-form-label">Téléserver Fichier</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image" required>

                            @error('image')
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
