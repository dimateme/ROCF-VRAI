<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">INSCRIRE UN PARTENAIRE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form action="{{route('admin.ajouter.directions')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="partenaire"> Partenaire </label>
                            {!! $errors->first('direction', '<small class="text-danger">:message</small>')!!}

                            <input class="form-control" type="text" name="direction" id="direction"   value="{{old('direction')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quitter</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
            </form>


        </div>
    </div>
</div>
