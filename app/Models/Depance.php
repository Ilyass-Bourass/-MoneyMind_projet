<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Depance extends Model
{
    /** @use HasFactory<\Database\Factories\DepanceFactory> */
    use HasFactory;
    protected $fillable = [
        'id_user',
        'titre',
        'description',
        'montant',
        'id_categorie',
        'type_depense'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

    public function scopeDepenseRecurrentes($query)
    {
        return $query->where('type_depense', 'recurrente')->where('id_user', Auth::user()->id);
    }

    public function scopeDepenseQuotidienne($query)
    {
        return $query->where('type_depense', 'quotidienne')->where('id_user', Auth::user()->id);
    }

    public static function somme_depense_recurrente()
    {
        return self::where('type_depense', 'recurrente')->where('id_user', Auth::user()->id)->sum('montant');
    }

    public static function somme_depense_quotidienne()
    {
        return self::where('type_depense', 'quotidienne')->where('id_user', Auth::user()->id)->sum('montant');
    }

    public static function pourcentage_depense_quotidienne()
    {
        $somme_depense_quotidienne = self::somme_depense_quotidienne();
        $montant_restant = User::find(Auth::user()->id)->salaire_mensuel;
        return ($somme_depense_quotidienne / $montant_restant) * 100;
    }

    public static function pourcentage_depense_recurrente()
    {
        $somme_depense_recurrente = self::somme_depense_recurrente();
        $montant_restant = User::find(Auth::user()->id)->salaire_mensuel;
        return ($somme_depense_recurrente / $montant_restant) * 100;
    }

    public static function get_depance_par_categorie()
    {
        $depenses = self::join('categories as c', 'depances.id_categorie', '=', 'c.id')
            ->select('c.nom as categorie', 
                    \DB::raw('SUM(depances.montant) as montant'))
            ->where('depances.id_user', Auth::user()->id)
            ->groupBy('c.nom')
            ->get();

        return $depenses->toArray();
    }

    public static function get_total_depance_categorie_alimentation(){

        $total = self::where('id_categorie', 2)->where('id_user', Auth::user()->id)->sum('montant');
        return $total;
    }

    
    
}

