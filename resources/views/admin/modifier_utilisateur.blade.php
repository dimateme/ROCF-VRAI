<div class="modal fade" id="modifier{{$unUtilisateur->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MODIFIER UN MEMBRE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form action="{{route('modifier.utilisateur',$unUtilisateur->id)}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="courriel"> Courriel </label>
                            {!! $errors->first('courriel', '<small class="text-danger">:message</small>')!!}

                            <input class="form-control" type="email" name="courriel" id="courriel"   value="{{$unUtilisateur->courriel}}">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="nom"> Nom </label>
                            {!!$errors->first('nom', '<small class="text-danger">:message</small>')!!}

                            <input class="form-control" type="text" name="nom" id="nom" readonly  placeholder="" value="{{$unUtilisateur->nom}}">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="prenom"> Prenom </label>
                            {!!$errors->first('prenom', '<small class="text-danger">:message</small>')!!}

                            <input class="form-control" type="text" name="prenom" id="prenom" readonly  placeholder="" value="{{$unUtilisateur->prenom}}">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="role"> Roles </label>
                            {!!$errors->first('role', '<small class="text-danger">:message</small>') !!}
                            <select class="form-control" name="role" id="role" value="{{old('role')}}">
                                @foreach($lesRoles as $unRole)
                                    <option @if($unRole->id==$unUtilisateur->id_role) selected @endif  value="{{ $unRole->id }}">{{ $unRole->role}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <label for="direction"> Directions </label>
                            <select name="direction" id="direction" class="form-control" value="{{old('direction')}}">
                                @foreach($lesDirections as $uneDirection)
                                    <option @if($uneDirection->id==$unUtilisateur->id_direction) selected @endif value="{{$uneDirection->id}}">{{$uneDirection->direction}}</option>
                                @endforeach
                            </select>
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
