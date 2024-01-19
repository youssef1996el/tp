@extends('Responsable.navbar')
@section('navbarresponsable')
<div class="contaienr">
    <div class="card shadow w-50 p-5" style="margin:auto">
        <form action="{{url('updateSout')}}" method="post">
            @csrf

            <div class="row">

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="">filiere</label>
                    <select name="filiere_id" id="" class="form-select">

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
                    <input type="date" class="form-control" name="debut" value="{{$data->debut}}">

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
                        @foreach ($Modules as $itemm)
                            <option value="{{$itemm->id}}">{{$itemm->nom_module}}</option>
                        @endforeach
                    </select>

                    <label for="">Fin</label>
                    <input type="date" class="form-control" name="fin" value="{{$data->fin}}">
                    <input type="text"  name="id" value="{{$data->id}}" hidden>
                </div>
                <button type="submit" class="btn btn-success">update</button>
            </div>
    </form>
    </div>
</div>
@endsection
