<div class="modal fade" id="supprimer{{$unUtilisateur->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form action="{{route('supprimer_utilisateur',$unUtilisateur->id)}}" method="GET">
                @csrf
                <div class="modal-body">
                    <h4 class="text-center">Êtez-vous sûr de vouloir supprimer l'utilisateur</h4>
                    <h5 class="text-center">{{$unUtilisateur->nom}} {{$unUtilisateur->prenom}}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quitter</button>
                    <button type="submit" class="btn btn-primary">Supprimer</button>
                </div>
            </form>


        </div>
    </div>
</div>
