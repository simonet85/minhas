<div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter </h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <form method="POST" action="{{route("profesionaldev.store")}}" class="g-3 " enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Titre</label>
                            <input type="text" name="title" value="{{old("title")}}" class="form-control @error('title') is-invalid @enderror" placeholder="Ex: Formation en Marketing">

                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Entreprise</label>
                            <input type="text" name="entreprise" value="{{old("entreprise")}}" class="form-control @error('entreprise') is-invalid @enderror" placeholder="Ex: Nom de l'entreprise">

                            @error('entreprise')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Description</label>
                            <textarea name="description" id="editor" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="La description de la formation"></textarea>

                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Date de debut</label>
                            <input type="date" name="date" value="{{old("date")}}" class="form-control @error('date') is-invalid @enderror">

                            @error('date')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Date de fin</label>
                            <input type="date" name="end_date" value="{{old("end_date")}}" class="form-control @error('end_date') is-invalid @enderror">

                            @error('end_date')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Lieu</label>
                            <input type="text" name="venue" value="{{old("venue")}}" class="form-control @error('venue') is-invalid @enderror" placeholder="Ex: Abidjan">

                            @error('venue')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Coûts</label>
                            <input type="text" name="cost" value="{{old("cost")}}" class="form-control @error('cost') is-invalid @enderror" placeholder="Ex: 200.000 Frs, peut contenir du texte.">

                            @error('cost')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Objectifs du stage/formation:</label>
                            <textarea name="course_objectives" id="editor-objectif" cols="30" rows="10" class="form-control @error('course_objectives') is-invalid @enderror" placeholder="Ex: Acquérir une expérience pratique... "></textarea>

                            @error('course_objectives')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Public cible:</label>
                            <input type="text" name="target_audience" value="{{old("target_audience")}}" class="form-control @error('target_audience') is-invalid @enderror" placeholder="Ex: Les membres de l'Association hydraulique ... ">

                            @error('target_audience')
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
    ClassicEditor
        .create(document.querySelector('#editor-objectif'))
        .catch(error => {
            console.error(error);
        });

</script>
