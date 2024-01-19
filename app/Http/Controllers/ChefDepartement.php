<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ChefDepartement extends Controller
{
    public function index()
    {
        $data = DB::select('select s.*,g.name as namegroupe,r.name as nameroom from schedules s,rooms r ,groups g where s.groupe_id = g.id and s.room_id = r.id');
        $groups = DB::select("select * from groups");
        $rooms = DB::select("select * from rooms");
        return view('ChefDepartement.index')
        ->with('data', $data)
        ->with('groups', $groups)
        ->with('rooms', $rooms)

        ;
    }

    public function StoreEmploi(Request $request)
    {
        $saveData = [
           'groupe_id'=>$request->groupe_id,
           'day'=>$request->day,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'room_id'=>$request->room_id,
            'nom_activite'=>$request->nom_activite
        ];

        DB::table('schedules')->insert($saveData);
        return redirect()->back();

    }

    public function EditEmploi($id)
    {
        $data = DB::select('select s.nom_activite,s.id,groupe_id, day, date(date_debut) as date_debut, date(date_fin)  as date_fin,g.name as namegroupe,r.name as nameroom from schedules s,rooms r ,groups g where s.groupe_id = g.id and s.room_id = r.id and s.id = ?',[$id]);
        $groups = DB::select("select * from groups");
        $rooms = DB::select("select * from rooms");
        return view('ChefDepartement.EditEmploi')->with('data', $data[0])
        ->with('groups', $groups)
        ->with('rooms', $rooms)

        ;
    }

    public function UpdateEmploi(Request $request)
    {
        $saveData =
        [
            'groupe_id'=>$request->groupe_id,
            'day'=>$request->day,
             'date_debut'=>$request->date_debut,
             'date_fin'=>$request->date_fin,
             'room_id'=>$request->room_id,
             'nom_activite'=>$request->nom_activite
        ];

        DB::table('schedules')->where('id',$request->id)->update($saveData);
        return redirect()->route('chefDépartement');
    }

    public function trashEmploi($id)
    {
        DB::table('schedules')->where('id', $id)->delete();
        return redirect()->route('chefDépartement');
    }
}
