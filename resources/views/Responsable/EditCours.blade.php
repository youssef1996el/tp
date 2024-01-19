@extends('Responsable.navbar')
@section('navbarresponsable')
<div class="contaienr">
    <div class="card shadow w-50 p-5" style="margin:auto">
        <form action="{{url('updateCours')}}" method="post">
            @csrf

        <div class="row">
            <div class="col-6">
                <label for="">nom_module</label>
                <input type="text" name="nom_module" value="{{$dataCours->nom_module}}" class="form-control">
                <label for="">nom_filiere</label>
                <input type="text" name="filiere_id" value="{{$dataCours->nom_filiere}}" class="form-control">

            </div>
            <div class="col-6 mt-4">

                <select name="status" id="" class="form-select">
                    <option value="0">Active</option>
                    <option value="1">desactive</option>
                </select>


                <input type="text" hidden name="id" value="{{$dataCours->id}}">
            </div>
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
    </div>
</div>
@endsection
