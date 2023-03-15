@extends('admin.template')
@section('admin')
    <div class="page-content">

        <div class="page-content">
            <div class="row">
                <div class="col-xl-12">


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ajouter une direction
                    </button>

                    <!-- Modal -->

                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="card-title mb-4">La liste des directions</h4>

                            <div class="table-responsive">
                                <table id="donneesDeLaTable" class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Partenaire</th>
                                        <th>Liens site</th>
                                        <th>Courriel</th>
                                        <th style="width: 120px;"></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lesDirections as $uneDirection)
                                        <tr>
                                            <td><h6 class="mb-0">{{$uneDirection->direction}}</h6></td>
                                            <td><h6 class="mb-0">{{$uneDirection->lien_site}}</h6></td>
                                            <td><h6 class="mb-0">{{$uneDirection->courriel}}</h6></td>
                                            <td>
                                                <a href="#modifier{{$uneDirection->id}}" data-bs-toggle="modal"  class="btn btn-warning">Modifier</a>
                                                <a href="#supprimer{{$uneDirection->id}}" data-bs-toggle="modal" class="btn btn-danger">Supprimer</a>
{{--                                            @include('admin/modifier_partenaires')--}}
{{--                                            @include('admin/supprimer_partenaires')--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @include('admin.ajouter_direction')
        </div>

    </div>
@endsection
