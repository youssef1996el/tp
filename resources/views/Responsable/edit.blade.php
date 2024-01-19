@extends('Responsable.navbar')
@section('navbarresponsable')
<div class="contaienr">
    <div class="card shadow w-50 p-5" style="margin:auto">
        <form action="{{url('updateAnnones')}}" method="post">
            @csrf

        <div class="row">
            <div class="col-6">
                <label for="">titre</label>
                <input type="text" name="titre" value="{{$data->titre}}" class="form-control">
                <label for="">nom_filiere</label>
                <select name="filiere_id" id="" class="form-select">
                    <option value="{{$data->idf}}">{{$data->nom_filiere}}</option>
                    @foreach ($filieres as $item)
                    <option value="{{$item->id}}">{{$item->nom_filiere}}</option>
                @endforeach
                </select>
            </div>
            <div class="col-6">

                <label for="">contenu</label>
                <input type="text" class="form-control"  name="contenu" value="{{$data->contenu}}">
                <label for="">nom_module</label>
                <select name="module_id" id="" class="form-select">
                    <option value="{{$data->idm}}">{{$data->nom_module}}</option>
                    @foreach ($modules as $itemm)
                    <option value="{{$itemm->id}}">{{$itemm->nom_module}}</option>
                @endforeach
                </select>
                <input type="text" hidden name="id" value="{{$data->id}}">
            </div>
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
    </div>
</div>
@endsection
