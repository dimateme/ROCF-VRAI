<div class="modal fade" id="modifier{{$uneConcertation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MODIFIER UNE CONCERTATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form action="{{route('admin.modifier.tables_concertation',$uneConcertation->id)}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="concertation"> Concertation </label>
                            <input class="form-control" type="text" name="concertation" id="concertation"   value="{{$uneConcertation->concertation}}">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quitter</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>


        </div>
    </div>
</div>
