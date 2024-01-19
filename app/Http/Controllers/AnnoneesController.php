<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AnnoneesController extends Controller
{
    public function Annonees()
    {
        $groupes =DB::select('select * from groups  ');
        $departments =DB::select('select * from departments  ');
        $soutenances = DB::select("select s.id,s.debut,s.fin,f.nom_filiere,m.nom_module,d.name,g.name as name_groupe from soutenances s,filieres f, departments d,modules m,groups g where s.filiere_id = f.id and s.groupe_id and g.id and s.departement_id = d.id and s.module_id = m.id;");
        $filieres = DB::select('select * from filieres');
        $modules = DB::select('select * from modules');
        $DataCours = DB::select('select m.id,m.nom_module,f.nom_filiere,m.status from modules m , filieres f where m.filiere_id = f.id;');
        $data = DB::select('select a.id,a.titre,a.contenu,u.name,f.nom_filiere,m.nom_module from users u , filieres f, modules m,annonces a where u.id = a.utilisateur_id and f.id = a.filiere_id and m.id = a.module_id');
        return view('Responsable.annonees')
        ->with('filieres', $filieres)
        ->with('modules', $modules)
        ->with('DataCours',$DataCours)
        ->with('soutenances',$soutenances)
        ->with('groupes',$groupes)
        ->with('departments',$departments)


        ->with('data',$data);
    }

    public function StoreAnnones(Request $request)
    {
        $dataSave = [
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'utilisateur_id'=>1,// change with Auth::user()->id
            'filiere_id'  => $request->filiere_id,
            'module_id'   => $request->module_id,

        ];
        DB::table('annonces')->insert($dataSave);
        return redirect()->back();
    }

    public function Edit($id)
    {
        $filieres = DB::select('select * from filieres');
        $modules = DB::select('select * from modules');
        $data = DB::select('select f.id as idf,m.id as idm,a.id,a.titre,a.contenu,u.name,f.nom_filiere,m.nom_module from users u , filieres f, modules m,annonces a where u.id = a.utilisateur_id
        and f.id = a.filiere_id and m.id = a.module_id and a.id = ?',[$id]);
        return view('Responsable.edit')
        ->with('filieres', $filieres)
        ->with('modules', $modules)
        ->with('data',$data[0]);
    }

    public function updateAnnones(Request $request)
    {
        $dataSave = [
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'utilisateur_id'=>1,// change with Auth::user()->id
            'filiere_id'  => $request->filiere_id,
            'module_id'   => $request->module_id,

        ];
        DB::table('annonces')->where('id', $request->id)->update($dataSave);
        return redirect()->route('Annonees');
    }
    public function trashAnnones($id)
    {
        DB::table('annonces')->where('id', $id)->delete();
        return redirect()->route('Annonees');
    }



}
