<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $Montant_restant = User::where('id', auth()->user()->id)->first()->montant_restant;
        $mon_salaire = User::where('id', auth()->user()->id)->first()->salaire_mensuel;
        
        return view('user.dashboard', compact('Montant_restant', 'mon_salaire'));
    }

    
} 