@extends('ChefDepartement.navbar')
@section('navbarchef')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container">
    <h3 class="text-uppercase bg-light p-3 border rounded-2">les emplois</h3>
    <div class="row">
        <div class="col-12 ">
            <button type="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#AddEmploi">
                Ajouter emploi
        </div>
    </div>
    <table class="table table-striped table-bordered mt-3">

        <thead>
            <tr>

                <th>groupe</th>
                <th>day</th>
                <th>date_debut</th>
                <th>date_fin</th>
                <th>room</th>
                <th>nom_activite</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>

                <td>{{$item->namegroupe}}</td>
                <td>{{$item->day}}</td>


                <td>{{ Carbon\Carbon::parse($item->date_debut)->format('Y-m-d') }}</td>
                <td>{{ Carbon\Carbon::parse($item->date_fin)->format('Y-m-d') }}</td>


                <td>{{$item->nameroom}}</td>
                <td>{{$item->nom_activite}}</td>



                <td>
                    <a href="{{ url('EditEmploi/' . $item->id) }}" class="fa-solid fa-pen-to-square btn btn-success"></a>
                    <a href="{{url('trashEmploi/' .$item->id)}}" class="fa-solid fa-trash btn btn-danger"></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="modal fade" id="AddEmploi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('StoreEmploi')}}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="">Groups</label>
                            <select name="groupe_id" id="" class="form-select">
                                <option value="">Please Select groups</option>
                                @foreach ($groups as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <label for="">Debut</label>
                            <input type="date" class="form-control" name="date_debut">
                            <label for="">Room</label>
                            <select name="room_id" id="" class="form-select">
                                <option value="">Please Select groups</option>
                                @foreach ($rooms as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="">day</label>
                            <input type="text" name="day" class="form-control">
                            <label for="">fin</label>
                                <input type="date" class="form-control" name="date_fin">
                                <label for="">nom activite</label>
                                <input type="text" name="nom_activite" class="form-control">
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
