@extends('Responsable.navbar')
@section('navbarresponsable')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="container">
        <h3 class="text-uppercase bg-light p-3 border rounded-2">les annonees</h3>
        <div class="row">
            <div class="col-12 ">
                <button type="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#AddAnnones">
                    Ajouter annone
            </div>
        </div>
        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th>Titre</th>
                    <th>contenu</th>
                    <th>Utilisateur</th>
                    <th>filiere</th>
                    <th>module</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>

                        <td>{{$item->titre}}</td>
                        <td>{{$item->contenu}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->nom_filiere}}</td>
                        <td>{{$item->nom_module}}</td>
                        <td>
                            <a href="{{ url('Edit/' . $item->id) }}" class="fa-solid fa-pen-to-square btn btn-success"></a>
                            <a href="{{url('trashAnnones/' .$item->id)}}" class="fa-solid fa-trash btn btn-danger" ></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="modal fade" id="AddAnnones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('StoreAnnones')}}" method="post">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label for="">Titre</label>
                                <input type="text" name="titre" class="form-control">
                                <label for="">contenu</label>
                                <input type="text" name="contenu" class="form-control">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label for="">contenu</label>
                                <select name="filiere_id" id="" class="form-select">
                                    <option value="">Please Select Filiter</option>
                                    @foreach ($filieres as $item)
                                        <option value="{{$item->id}}">{{$item->nom_filiere}}</option>
                                    @endforeach
                                </select>
                                <label for="">module</label>
                                <select name="module_id" id="" class="form-select">
                                    <option value="">Please Select Module</option>
                                    @foreach ($modules as $itemm)
                                        <option value="{{$itemm->id}}">{{$itemm->nom_module}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                    </div>
                </form>
              </div>
            </div>
          </div>

          <h3 class="text-uppercase bg-light p-3 border rounded-2">Arret des cours</h3>
          <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th>nom_module</th>
                    <th>filiere</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($DataCours as $itemm)
                <tr>

                    <td>{{$itemm->nom_module}}</td>
                    <td>{{$itemm->nom_filiere}}</td>
                    @if ($itemm->status == 0)
                        <td>Active</td>
                        @else
                        <td>non active</td>
                    @endif

                    <td>
                        <a href="{{ url('EditCours/' . $itemm->id) }}" class="fa-solid fa-pen-to-square btn btn-success"></a>
                        <a href="{{url('trashCours/' .$itemm->id)}}" class="fa-solid fa-trash btn btn-danger" ></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <h3 class="text-uppercase bg-light p-3 border rounded-2">Soutenances</h3>
        <div class="row">
            <div class="col-12 ">
                <button type="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#AddDeparement">
                    Ajouter depatement
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Groupe</th>
                    <th>Filier</th>
                    <th>Departement</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($soutenances as $item)
                    <tr>

                        <td>{{$item->name_groupe}}</td>
                        <td>{{$item->nom_filiere}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->debut}}</td>
                        <td>{{$item->fin}}</td>
                        <td>
                            <a href="{{ url('EditSoute/' . $item->id) }}" class="fa-solid fa-pen-to-square btn btn-success"></a>
                            <a href="{{url('TrashSoute/' .$item->id)}}" class="fa-solid fa-trash btn btn-danger" ></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="modal fade" id="AddDeparement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('StoreDepatement')}}" method="post">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label for="">filiere</label>
                                <select name="filiere_id" id="" class="form-select">
                                    <option value="">Please Select Filiter</option>
                                    @foreach ($filieres as $item)
                                        <option value="{{$item->id}}">{{$item->nom_filiere}}</option>
                                    @endforeach
                                </select>

                                <label for="">groupe</label>
                                <select name="groupe_id" id="" class="form-select">
                                    <option value="">Please Select Filiter</option>
                                    @foreach ($groupes as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <label for="">Debut</label>
                                <input type="date" class="form-control" name="debut">

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label for="">departement</label>
                                <select name="departement_id" id="" class="form-select">
                                    <option value="">Please Select Filiter</option>
                                    @foreach ($departments as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <label for="">module</label>
                                <select name="module_id" id="" class="form-select">
                                    <option value="">Please Select Module</option>
                                    @foreach ($modules as $itemm)
                                        <option value="{{$itemm->id}}">{{$itemm->nom_module}}</option>
                                    @endforeach
                                </select>

                                <label for="">Debut</label>
                                <input type="date" class="form-control" name="fin">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                    </div>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection
