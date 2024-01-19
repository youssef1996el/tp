@extends('ChefDepartement.navbar')
@section('navbarchef')
<div class="contaienr">
    <div class="card shadow w-50 p-5" style="margin:auto">
        <form action="{{url('updateEmploi')}}" method="post">
            @csrf

            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="">Groups</label>
                    <select name="groupe_id" id="" class="form-select">

                        @foreach ($groups as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <label for="">Debut</label>
                    <input type="date" class="form-control" name="date_debut" value="{{$data->date_debut}}">
                    <label for="">Room</label>
                    <select name="room_id" id="" class="form-select">

                        @foreach ($rooms as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="">day</label>
                    <input type="text" name="day" class="form-control" value="{{$data->day}}">
                    <label for="">fin</label>
                        <input type="date" class="form-control" name="date_fin" value="{{$data->date_fin}}">
                        <label for="">nom activite</label>
                        <input type="text" name="nom_activite" class="form-control" value="{{$data->nom_activite}}">
                        <input type="text" name="id" value="{{$data->id}}" hidden>
                </div>
                <button class="btn btn-success w-25 mt-3 " type="submit">Update</button>
            </div>
    </form>
    </div>
</div>
@endsection
