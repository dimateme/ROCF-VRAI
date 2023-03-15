<div class="modal fade" id="supprimer{{$uneConcertation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form action="{{route('admin.supprimer.tables_concertation',$uneConcertation->id)}}" method="GET">
                @csrf
                <div class="modal-body">
                    <h5 class="text-center">Êtez-vous sûr de vouloir supprimer le partenaire</h5>
                    <h5 class="text-center">{{$uneConcertation->concertation}} </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quitter</button>
                    <button type="submit" class="btn btn-primary">Supprimer</button>
                </div>
            </form>


        </div>
    </div>
</div>
