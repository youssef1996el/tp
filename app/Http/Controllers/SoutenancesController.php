<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SoutenancesController extends Controller
{
    public function EditSoute($id)
    {
        $data = DB::select('select s.id,s.debut,s.fin,f.nom_filiere,m.nom_module,d.name,g.name as name_groupe
        from soutenances s,filieres f, departments d,modules m,groups g where s.filiere_id = f.id and s.groupe_id and g.id and s.departement_id = d.id and s.module_id = m.id and s.id = ?',[$id]);

        $Modules = DB::select("  select * from modules;");

        $filieres = DB::select('select * from filieres');
        $groupes =DB::select('select * from groups  ');
        $departments =DB::select('select * from departments  ');
        return view('Responsable.EditSout')
        ->with('data',$data[0])
        ->with('Modules',$Modules)
        ->with('filieres',$filieres)
        ->with('groupes',$groupes)
        ->with('departments',$departments)



        ;
    }

    public function StoreDepatement(Request $request)
    {
        $saveData = [
            'filiere_id' => $request->filiere_id,
            'groupe_id' => $request->groupe_id,
            'departement_id' => $request->departement_id,
            'module_id' => $request->module_id,
            'debut' => $request->debut,
            'fin' => $request->fin
        ];

        Db::table('soutenances')->insert($saveData);
        return redirect()->route('Annonees');
    }

    public function updateSout(REquest $request)
    {
        $saveData = [
            'filiere_id' => $request->filiere_id,
            'groupe_id' => $request->groupe_id,
            'departement_id' => $request->departement_id,
            'module_id' => $request->module_id,
            'debut' => $request->debut,
            'fin' => $request->fin
        ];


        Db::table('soutenances')->where('id',$request->id)->update($saveData);
        return redirect()->route('Annonees');
    }

    public function TrashSoute(Request $request)
    {
        Db::table('soutenances')->where('id',$request->id)->delete();
        return redirect()->route('Annonees');
    }
}
