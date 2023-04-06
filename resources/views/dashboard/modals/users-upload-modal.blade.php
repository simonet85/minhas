<div class="modal fade" id="upload" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Importer fichier </h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <!-- General Form Elements -->
                <form method="POST" action="{{route('users.uploadCsv')}}" class="g-3" enctype="multipart/form-data" novalidate>

                    @csrf

                    <div class="row mb-3">

                        <div class="form-group">
                            <label for="inputNumber" class=" col-form-label">Téléverser Fichier</label> <br>
                            <input class=" form-control-file @error('file') is-invalid @enderror" type="file" id="formFile" name="file">

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

                <button type="submit" class="btn btn-danger">Téléverser</button>
            </div>
            </form>
        </div>
    </div>
</div>
