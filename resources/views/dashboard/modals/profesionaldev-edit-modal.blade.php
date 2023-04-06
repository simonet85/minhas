<div class="modal fade" id="edit-{{$profesionalDev->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier </h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <!-- General Form Elements -->
                <form method="POST" action="{{route("profesionaldev.update", $profesionalDev->id)}}" class="g-3" enctype="multipart/form-data" novalidate>

                    @method("PUT")
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Titre</label>
                            <input type="text" name="title" value="{{$profesionalDev->title}}" class="form-control @error('title') is-invalid @enderror" placeholder="Ex: Bienvenue l'association des droits ...." required>

                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Entreprise</label>
                            <input type="text" name="entreprise" value="{{$profesionalDev->entreprise}}" class="form-control @error('entreprise') is-invalid @enderror" placeholder="Ex: Google">

                            @error('button')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Description</label>
                            <textarea name="description" id="editor-{{$profesionalDev->id}}" cols="30" rows="10" class="form-control" required>{!! $profesionalDev->description!!}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <script>
                            ClassicEditor
                                .create(document.querySelector(`#editor-{{$profesionalDev->id}}`))
                                .catch(error => {
                                    console.error(error);
                                });

                        </script>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Date de début</label>
                            <input type="date" name="date" value="{{$profesionalDev->date}}" class="form-control @error('date') is-invalid @enderror">

                            @error('date')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Date de fin</label>
                            <input type="date" name="end_date" value="{{$profesionalDev->end_date}}" class="form-control @error('end_date') is-invalid @enderror">

                            @error('end_date')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Lieu</label>
                            <input type="text" name="venue" value="{{$profesionalDev->venue}}" class="form-control @error('venue') is-invalid @enderror" placeholder="Ex: Abidjan">

                            @error('venue')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Coûts</label>
                            <input type="text" name="cost" value="{{$profesionalDev->cost}}" class="form-control @error('cost') is-invalid @enderror" placeholder="Ex: 200.000 Frs">

                            @error('cost')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Objectifs du stage/formation:</label>
                            <textarea name="course_objectives" id="editor-objectif-{{$profesionalDev->id}}" cols="30" rows="10" class="form-control @error('course_objectives') is-invalid @enderror" placeholder="Ex: Acquérir une expérience pratique... ">{!!$profesionalDev->course_objectives!!}</textarea>

                            @error('course_objectives')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <script>
                            ClassicEditor
                                .create(document.querySelector(`#editor-objectif-{{$profesionalDev->id}}`))
                                .catch(error => {
                                    console.error(error);
                                });

                        </script>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Public cible:</label>
                            <input type="text" name="target_audience" value="{{$profesionalDev->target_audience}}" class="form-control @error('target_audience') is-invalid @enderror" placeholder="Ex: Les membres de l'Association hydraulique ... ">

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

                <button type="submit" class="btn btn-danger">Modifier</button>
            </div>
            </form>
        </div>
    </div>
</div>
