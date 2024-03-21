<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// Here I specify where is ControladorTreballador class.
use App\Http\Controllers\ControladorTreballador;

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

Route::get('/', function () {
    // Here I open inici.blade.php, which is on resources/views.
    return view('inici');
});

/*
    If I type /treballadors, it'll execute a method from ControladorTreballador.
    I use resource, as I want to be able to use get, post, update or delete at the same time.

    GET/HEAD -> index, show, edit, create.
    POST -> store.
    PUT (and PATCH) -> update.
    DELETE-> destroy.
*/

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('trebs', ControladorTreballador::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('treballadors', ControladorTreballador::class);
});

require __DIR__.'/auth.php';

// use App\Models\Treballador;
// Route::post('/noureg', function () {
//     $dades= array("nom"=>"Jaume", "cognoms"=>"Pons", "nif"=>"46108810Q",
//         "data_naixement"=>"2000-03-15","sexe"=>"d",
//         "adressa"=>"Carrer de Valènica, 690, 1-2", "tlf_fixe"=>934567890,
//         "tlf_mobil"=>666339900, "email"=>"jpons@gmail.com",
//         "treball_distancia"=>true,"tipus_contracte"=>"temporal",
//         "data_contractacio"=>"2018-03-15","categoria"=>3,
//         "nom_feina"=>"desenvolupador junior", "sou"=>1404,47);

//     Treballador::create($dades);

//     $dades= array("nom"=>"Anna", "cognoms"=>"Puig", "nif"=>"47108810P",
//         "data_naixement"=>"2000-03-15","sexe"=>"d",
//         "adressa"=>"Carrer de Valènica, 680, 2-2", "tlf_fixe"=>934567899,
//         "tlf_mobil"=>666339911, "email"=>"apuig@gmail.com",
//         "treball_distancia"=>false,"tipus_contracte"=>"temporal",
//         "data_contractacio"=>"2021-03-15","categoria"=>2,
//         "nom_feina"=>"desenvolupador senior", "sou"=>1704,97);

//     Treballador::create($dades);
//     });

// Route::get('/mostrareg', function () {
//     $nom="Jaume";
//     $dades=Treballador::where("nom","=",$nom)->first();
//     echo $dades["cognoms"]."\n";
// });
// Route::delete('/delreg', function () {
//     $nom="Jaume";
//     Treballador::where("nom","=",$nom)->delete();
// });
