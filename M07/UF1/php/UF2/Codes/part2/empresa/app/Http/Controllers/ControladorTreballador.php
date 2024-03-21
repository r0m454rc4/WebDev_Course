<?php

namespace App\Http\Controllers;
use App\Models\Treballador;

use Illuminate\Http\Request;
/*
    Depending on the requested HTTP method, I'll execute one method or another.

    GET/HEAD -> index, show, edit, create.
    POST -> store.
    PUT (and PATCH) -> update.
    DELETE-> destroy.
*/
class ControladorTreballador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_treballadors = Treballador::all();
        return view('llista2', compact('dades_treballadors'));
        // Recollirà totes les entrades de la taula treballadors i les desarà dins d'una
        //variable de nom $dades_treballadors
        //Cridara a la vista llista.blade.php que es trobarà a resouces/views per
        //mostrar les dades dels treballadors
        //The compact() function creates an array from variables and their values.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crea');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nouTreballador = $request->validate([
            'nom' => 'required',
            'cognoms' => 'required',
            'nif' => 'required',
            'data_naixement' => 'required',
            'sexe' => 'required',
            'adressa' => 'required',
            'tlf_fixe' => 'required',
            'tlf_mobil' => 'required',
            'email' => 'required',
            'treball_distancia' => 'required',
            'tipus_contracte' => 'required',
            'data_contractacio' => 'required',
            'categoria' => 'required',
            'nom_feina' => 'required',
            'sou' => 'required'
            ]);
        $treballador = Treballador::create($nouTreballador);
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dades_treballador = Treballador::findOrFail($tid);
        return view('mostra',compact('dades_treballador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dades_treballador = Treballador::findOrFail($tid);
        return view('actualitza',compact('dades_treballador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $noves_dades_treballador = $request->validate([
            'nom' => 'required',
            'cognoms' => 'required',
            'nif' => 'required',
            'data_naixement' => 'required',
            'sexe' => 'required',
            'adressa' => 'required',
            'tlf_fixe' => 'required',
            'tlf_mobil' => 'required',
            'email' => 'required',
            'treball_distancia' => 'required',
            'tipus_contracte' => 'required',
            'data_contractacio' => 'required',
            'categoria' => 'required',
            'nom_feina' => 'required',
            'sou' => 'required'
        ]);
        // Search the register, and then, update the entered data.
        Treballador::findOrFail($tid)->update($noves_dades_treballador);
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $treballador = Treballador::findOrFail($tid)->delete();
        return view('dashboard');
    }
}
