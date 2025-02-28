<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request)
    {
        $categorie = Categorie::create([
            'nom' => $request->name
        ]);

        return redirect()->route('categorie')->with('success', 'Catégorie créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Categorie::all();
        $categorie = Categorie::find($id);
        return view('admin.editCategory', compact('categorie','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, $id)
    {
        
        $categorie = Categorie::find($id);
        $categorie->update([
            'nom' => $request->name
        ]);
        return redirect()->route('categorie')->with('success', 'Catégorie modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect()->route('categorie')->with('success', 'Catégorie supprimée avec succès');
    }

    
}
