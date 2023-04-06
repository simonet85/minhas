<div class="modal fade" id="edit-{{$message->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Répondre </h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">


                <div class="row mb-3">
                    <div class="col-sm-12">
                        <label for="inputText" class=" col-form-label">Nom</label>
                        <input type="text" name="name" value="{{$message->name}}" class="form-control" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <label for="inputText" class=" col-form-label">Email</label>
                        <input type="text" name="email" value="{{$message->email}}" class="form-control" disabled>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-sm-12">
                        <label for="inputText" class=" col-form-label">Message</label>
                        <textarea name="message" id="" cols="30" rows="5" class="form-control" disabled>{{$message->message}}</textarea>
                    </div>
                </div>
                <!-- General Form Elements -->
                <form method="POST" action="{{route('messages.send', $message->id)}}" class="g-3" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Réponse</label>
                            <textarea name="reply" id="editor-{{$message->id}}" cols="30" rows="5" class="form-control @error('reply') is-invalid @enderror" autofocus></textarea>

                            @error('reply')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                            <input type="hidden" name="email" value="{{ $message->email }}">
                        </div>
                        <script>
                            ClassicEditor
                                .create(document.querySelector(`#editor-{{$message->id}}`))
                                .catch(error => {
                                    console.error(error);
                                });

                        </script>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-white" data-bs-dismiss="modal">
                    Fermer
                </button>

                <button type="submit" class="btn btn-danger">Répondre</button>
            </div>
            </form>
        </div>
    </div>
</div>
