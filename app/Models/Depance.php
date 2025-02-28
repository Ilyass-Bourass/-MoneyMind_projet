<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
        return $query->where('type_depense', 'recurrente');
    }

    public function scopeDepenseQuotidienne($query)
    {
        return $query->where('type_depense', 'quotidienne');
    }

    public static function somme_depense_recurrente()
    {
        return self::where('type_depense', 'recurrente')->sum('montant');
    }

    public static function somme_depense_quotidienne()
    {
        return self::where('type_depense', 'quotidienne')->sum('montant');
    }

    public static function pourcentage_depense_quotidienne()
    {
        $somme_depense_quotidienne = self::somme_depense_quotidienne();
        $montant_restant = User::find(Auth::user()->id)->montant_restant;
        return ($somme_depense_quotidienne / $montant_restant) * 100;
    }

    public static function pourcentage_depense_recurrente()
    {
        $somme_depense_recurrente = self::somme_depense_recurrente();
        $montant_restant = User::find(Auth::user()->id)->montant_restant;
        return ($somme_depense_recurrente / $montant_restant) * 100;
    }
    
}

