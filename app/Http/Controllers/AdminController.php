<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categorie;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function categories()
    {
        return view('admin.categories');
    }

    public function messages()
    {
        return view('admin.messages');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user')->with('success', 'Utilisateur supprimé avec succès');
    }

    public function dashbord()
    {
        $nbr_users = User::count();
        $nbr_categories = Categorie::count();
        return view('admin.dashboard', compact('nbr_users', 'nbr_categories'));
    }
} 