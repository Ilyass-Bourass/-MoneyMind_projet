<?php

namespace App\Http\Controllers;

use App\Models\GestionRevenus;
use App\Http\Requests\StoreGestionRevenusRequest;
use App\Http\Requests\UpdateGestionRevenusRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestionRevenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Revenus=GestionRevenus::where('user_id',auth()->user()->id)->get();
        $totalRevenus=$this->totalRevenus(auth()->user()->id);
        return view('user.gestionRevenus',compact('Revenus','totalRevenus'));
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
            'titre' => 'required|string|max:255',
            'montant' => 'required|numeric|min:0',
            'description' => 'required|string'
        ]);

        GestionRevenus::create([
            'nom' => $request->titre,
            'montant' => $request->montant,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);
        $user = User::find(Auth::id());
        $user->augmentation_montant_restant($request->montant);

        return redirect()->back()->with('success', 'Revenu ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(GestionRevenus $gestionRevenus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gestionRevenu = GestionRevenus::find($id);
        return view('user.editRevenu',compact('gestionRevenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $revenu = GestionRevenus::findOrFail($id);
        
        $request->validate([
            'titre' => 'required|string|max:255',
            'montant' => 'required|numeric|min:0',
            'description' => 'required|string'
        ]);

        $revenu->update([
            'nom' => $request->titre,
            'montant' => $request->montant,
            'description' => $request->description
        ]);

        return redirect()->route('gestionRevenus')->with('success', 'Revenu modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $revenu=GestionRevenus::find($id);
        $user = User::find(Auth::id());
        $user->diminution_montant_restant($revenu->montant);
        $revenu->delete();
        return redirect()->route('gestionRevenus')->with('succes','revenu a été supprimer avec succès');
    }

    private function totalRevenus($user_id){
        return GestionRevenus::where('user_id',$user_id)->sum('Montant');
    }
}
