<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnoneesController;
use App\Http\Controllers\ControllerCours;
use App\Http\Controllers\SoutenancesController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ChefDepartement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function()
{



    $groupes =DB::select('select * from groups  ');

    $departments =DB::select('select * from departments  ');
    $soutenances = DB::select("select s.id,s.debut,s.fin,f.nom_filiere,m.nom_module,d.name,g.name as name_groupe from soutenances s,filieres f, departments d,modules m,groups g where s.filiere_id = f.id and s.groupe_id and g.id and s.departement_id = d.id and s.module_id = m.id;");
    $filieres = DB::select('select * from filieres');
    $modules = DB::select('select * from modules');
    $data = DB::select('select a.id,a.titre,a.contenu,u.name,f.nom_filiere,m.nom_module from users u , filieres f, modules m,annonces a where u.id = a.utilisateur_id and f.id = a.filiere_id and m.id = a.module_id');
    $DataCours = DB::select('select m.id,m.nom_module,f.nom_filiere,m.status from modules m , filieres f where m.filiere_id = f.id;');
    return view('Responsable.annonees')
        ->with('filieres', $filieres)
        ->with('modules', $modules)
        ->with('DataCours',$DataCours)
       ->with('soutenances',$soutenances)
       ->with('groupes',$groupes)
       ->with('departments',$departments)
        ->with('data',$data);
});
Route::post('StoreAnnones',[AnnoneesController::class,'StoreAnnones']);
Route::get('Edit/{id}',[AnnoneesController::class,'Edit']);
Route::post('updateAnnones',[AnnoneesController::class,'updateAnnones']);
Route::get('trashAnnones/{id}',[AnnoneesController::class,'trashAnnones']);

Route::get('EditCours/{id}',[ControllerCours::class,'editCours']);
Route::get('trashCours/{id}',[ControllerCours::class,'trashCours']);
Route::post('updateCours',[ControllerCours::class,'updateCours']);


Route::get('EditSoute/{id}',[SoutenancesController::class,'EditSoute']);
Route::get('TrashSoute/{id}',[SoutenancesController::class,'TrashSoute']);
Route::post('updateSout',[SoutenancesController::class,'updateSout']);
Route::post('StoreDepatement',[SoutenancesController::class,'StoreDepatement']);


/////////////////////////////// Chef Département
Route::get('chefDépartement',[ChefDepartement::class,'index'])->name('chefDépartement');
Route::post('StoreEmploi',[ChefDepartement::class,'StoreEmploi']);
Route::get('EditEmploi/{id}',[ChefDepartement::class,'EditEmploi']);
Route::post('updateEmploi',[ChefDepartement::class,'UpdateEmploi']);
Route::get('trashEmploi/{id}',[ChefDepartement::class,'trashEmploi']);
Auth::routes();
Route::get('Annonees',[AnnoneesController::class,'Annonees'])->name('Annonees');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
