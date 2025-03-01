<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Depance;

class UserController extends Controller
{
    public function index()
    {
        $Montant_restant = User::where('id', auth()->user()->id)->first()->montant_restant;
        $mon_salaire = User::where('id', auth()->user()->id)->first()->salaire_mensuel;
        $objectif_mensuel = User::where('id', auth()->user()->id)->first()->objectif_mensuel;
        $total_depense_alimentation = Depance::get_total_depance_categorie_alimentation();
        // $depenses_par_categorie = Depance::get_depance_par_categorie();
        
        return view('user.dashboard', compact('Montant_restant', 'mon_salaire', 'total_depense_alimentation', 'objectif_mensuel'));
    }

    
} 