<?php

namespace App\Http\Controllers;

use App\Models\Depance;
use App\Http\Requests\StoreDepanceRequest;
use App\Http\Requests\UpdateDepanceRequest;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class DepanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        $depances_reccurentes=Depance::DepenseRecurrentes()->get();
        $depances_ponctuelles=Depance::DepenseQuotidienne()->get();
        $somme_depense_recurrente = Depance::somme_depense_recurrente();
        $somme_depense_quotidienne = Depance::somme_depense_quotidienne();
        $pourcentage_depense_quotidienne = Depance::pourcentage_depense_quotidienne();
        $pourcentage_depense_recurrente = Depance::pourcentage_depense_recurrente();    
        return view('user.depance', compact('categories','depances_reccurentes','depances_ponctuelles','somme_depense_recurrente','somme_depense_quotidienne','pourcentage_depense_quotidienne','pourcentage_depense_recurrente'));
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
    public function store(StoreDepanceRequest $request)
    {
        //dd($request->all());
        $request->validate([
            
            'titre' => 'required',
            'montant' => 'required',
            'description' => 'required',
            'id_categorie' => 'required',
            'type_depanse' => 'required',

        ]);
        //dd($request->all());
        $user = User::find(Auth::id());
        $user->diminution_montant_restant($request->montant);
        $depance = new Depance();
        $depance->id_user = Auth::id();
        $depance->titre = $request->titre;
        $depance->montant = $request->montant;
        $depance->description = $request->description;
        $depance->id_categorie = $request->id_categorie;
        $depance->type_depense = $request->type_depanse;
        $depance->save();
        return redirect()->back()->with('success', 'Depance ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Depance $depance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depance $depance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepanceRequest $request, Depance $depance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depance $depance)
    {
        $user = User::find(Auth::user()->id);
        $user->augmentation_montant_restant($depance->montant);
        $depance = Depance::find($depance->id);
        $depance->delete();
        return redirect()->back()->with('success', 'Depance supprimée avec succès');
    }
}
