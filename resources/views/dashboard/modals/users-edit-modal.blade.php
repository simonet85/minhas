<div class="modal fade" id="edit-{{$user->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Modifier </h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <!-- General Form Elements -->
                <form method="POST" action="{{route("users.update", $user->id)}}" class="g-3" enctype="multipart/form-data" novalidate>

                    @method("PUT")
                    @csrf

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Nom</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Ex: Bienvenue l'association des droits ....">

                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" name="role" id="">
                                @foreach($roles as $role)
                                <option value="{{$role}}" {{ $user->role == $role ? 'selected' : '' }}>{{$role}}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Emploi</label>
                            <input type="text" name="job" value="{{$user->job}}" class="form-control @error('job') is-invalid @enderror">
                            @error('job')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Direction Régionale</label>
                            <input type="text" name="place" value="{{$user->place}}" class="form-control @error('place') is-invalid @enderror">
                            @error('place')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="inputText" class=" col-form-label">Type de membre</label>
                            <select class="form-select @error('membership') is-invalid @enderror" name="membership" id="">
                                @foreach($memberships as $membership)
                                <option value="{{$membership}}" {{ $user->membership == $membership ? 'selected' : '' }}>{{$membership}}</option>
                                @endforeach
                                {{-- <option value=""></option> --}}
                            </select>
                            {{-- <input type="text" name="membership" value="{{$user->membership}}" class="form-control @error('membership') is-invalid @enderror" required> --}}
                            @error('membership')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-sm-12">
                            <img id="imagePreview" src="{{asset('/storage/users/'.$user->photo)}}" alt="{{$user->photo}}">
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-sm-12">
                            <label for="inputNumber" class=" col-form-label">Téléserver Fichier</label>
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" id="formFile" name="photo">

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
