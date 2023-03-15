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
                            <label for="partenaire"> Direction </label>
                            {!! $errors->first('direction', '<small class="text-danger">:message</small>')!!}

                            <input class="form-control" type="text" name="direction" id="direction"   value="{{old('direction')}}">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="lien_site"> Lien site </label>
                            {!! $errors->first('lien_site', '<small class="text-danger">:message</small>')!!}

                            <input class="form-control" type="url" name="lien_site" id="lien_site"   value="{{old('lien_site')}}">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="courriel"> Courriel </label>
                            {!! $errors->first('courriel', '<small class="text-danger">:message</small>')!!}

                            <input class="form-control" type="email" name="courriel" id="courriel"   value="{{old('courriel')}}">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="telephone"> Telephone </label>
                            {!! $errors->first('telephone', '<small class="text-danger">:message</small>')!!}

                            <input class="form-control" type="text" name="telephone" id="telephone"   value="{{old('telephone')}}">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="adresse"> Adresse </label>
                            {!!$errors->first('adresse', '<small class="text-danger">:message</small>')!!}

                            <input class="form-control" type="text" name="adresse" id="adresse"  placeholder="" value="{{old('adresse')}}">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="code_postal"> Code postal </label>
                            {!!$errors->first('code_postal', '<small class="text-danger">:message</small>')!!}

                            <input class="form-control" type="text" name="code_postal" id="code_postal"  placeholder="" value="{{old('code_postal')}}">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quitter</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>
