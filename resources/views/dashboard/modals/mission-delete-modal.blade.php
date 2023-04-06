<div class="modal fade" id="delete-{{$missionObjectif->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Voulez-vous vraiment supprimer?</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Cette action est irréversible et vos données seront perdues indéfiniment.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-white" data-bs-dismiss="modal">Fermer</button>
                <form method="POST" action="{{route('missionobjectif.destroy', $missionObjectif->id)}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
