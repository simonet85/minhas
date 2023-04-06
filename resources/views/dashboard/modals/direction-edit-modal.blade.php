<div class="modal fade" id="edit-{{$direction->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <form method="POST" action="{{route('directionmanagement.update', $direction->id)}}" class="g-3" enctype="multipart/form-data" novalidate>

                    @method("PUT")
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Nom et prénom(s)</label>
                            <input type="text" name="name" value="{{$direction->name}}" class="form-control @error('name') is-invalid @enderror" required>

                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Attribution(s)</label>
                            <input type="text" name="attribute" value="{{$direction->attribute}}" class="form-control @error('attribute') is-invalid @enderror" required>

                            @error('attribute')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Description</label>
                            <textarea id="desc-{{$direction->id}}" name="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ $direction->description }}</textarea>

                    @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
            </div>

            <script>
                ClassicEditor
                    .create(document.querySelector(`#desc-{{ $direction->id }}`))
                    .catch(error => {
                        console.error(error);
                    });

            </script>

        </div> --}}


        <div class="row mb-3 ">
            <div class="col-sm-12">
                <img id="imagePreview" src="{{asset('storage/directions/'.$direction->photo)}}" alt="">
            </div>
        </div>
        <div class="row mb-3">

            <div class="col-sm-12">
                <label for="inputNumber" class=" col-form-label">Téléserver Fichier</label>
                <input class="form-control @error('photo') is-invalid @enderror" type="file" id="formFile" name="photo" required>

                @error('photo')
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
