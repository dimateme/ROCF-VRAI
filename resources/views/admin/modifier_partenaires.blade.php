<div class="modal fade" id="modifier{{$unPartenaire->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MODIFIER UN MEMBRE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form action="{{route('modifier.partenaire',$unPartenaire->id)}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="partenaire"> Partenaire </label>
                            <input class="form-control" type="text" name="partenaire" id="partenaire"   value="{{$unPartenaire->partenaire}}">
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
