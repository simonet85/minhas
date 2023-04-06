<div class="modal fade" id="modal-add-supportservice" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter </h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <form method="POST" action="{{route("supportservices.store")}}" class="g-3 " enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Titre</label>
                            <input type="text" name="title" value="{{old("title")}}" class="form-control @error('title') is-invalid @enderror" placeholder="Ex: Accès à des contenus exclusifs">

                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Description</label>
                            <textarea value="{{old("description")}}" name="description" id="editor" cols="30" rows="10" class="form-control  @error('description') is-invalid @enderror" placeholder="Entrer La description ..."></textarea>

                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-white" data-bs-dismiss="modal">
                    Fermer
                </button>

                <button type="submit" class="btn btn-primary">Créer</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>
