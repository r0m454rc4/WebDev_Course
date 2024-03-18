<?php

namespace App\Http\Controllers;
use App\Models\Treballador;

use Illuminate\Http\Request;

// Depending on the requested HTTP method, I'll execute one method or another.

// GET/HEAD -> index, show, edit, create.
// POST -> store.
// PUT (and PATCH) -> update.
// DELETE-> destroy.
class ControladorTreballador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_treballadors = Treballador::all();
        return view('llista', compact('dades_treballadors'));
        // Recollirà totes les entrades de la taula treballadors i les desarà dins d'una variable de nom $dades_treballadors
        // Cridara a la vista llista.blade.php que es trobarà a resouces/views per mostrar les dades dels treballadors
        // The compact() function creates an array from variables and their values.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
