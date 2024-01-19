<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ControllerCours extends Controller
{
    //
    public function editCours($id)
    {

        $dataCours = DB::select('select m.id,m.nom_module,f.nom_filiere from modules m , filieres f where m.filiere_id = f.id and m.id = ?',[$id]);

        return view('Responsable.EditCours')
        ->with('dataCours',$dataCours[0]);
    }
    public function updateCours(Request $request)
    {

        $dataSave = [
            'nom_module' => $request->nom_module,

            'status'=>$request->status,// change with Auth::user()->id

        ];

        DB::table('modules')->where('id', $request->id)->update($dataSave);
        return redirect()->route('Annonees');
    }

    public function trashCours($id)
    {
        DB::table('modules')->where('id', $id)->delete();
        return redirect()->route('Annonees');
    }
}
