<?php

namespace App\Http\Controllers;

use App\Models\ListeSouhait;
use App\Http\Requests\StoreListeSouhaitRequest;
use App\Http\Requests\UpdateListeSouhaitRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ListeSouhaitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listeSouhaits = ListeSouhait::where('user_id', Auth::id())->get();
        $salaire_sauve = User::where('id', Auth::id())->first()->salaire_sauve;
        
        return view('user.listeSouhait', compact('listeSouhaits', 'salaire_sauve'));
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
        $request->validate([
            'nom' => 'required|string|max:255',
            'montant' => 'required|numeric|min:0',
        ]);

        ListeSouhait::create([
            'user_id' => Auth::id(),
            'nom' => $request->nom,
            'montant' => $request->montant,
        ]);

        return redirect()->route('listeSouhait')->with('success', 'Souhait ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ListeSouhait $listeSouhait)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListeSouhait $listeSouhait)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListeSouhaitRequest $request, ListeSouhait $listeSouhait)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $listeSouhait = ListeSouhait::find($id);
        $listeSouhait->delete();
        return redirect()->route('listeSouhait')->with('success', 'Souhait supprimé avec succès!');
    }
}
