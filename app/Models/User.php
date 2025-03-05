<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\DepenseAlerte;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'salaire_mensuel',
        'objectif_mensuel',
        'salaire_sauve',
        'date_credit',
        'montant_restant',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function depances()
    {
        return $this->hasMany(Depance::class);
    }

    public function diminution_montant_restant($montant)
    {
        $this->montant_restant -= $montant;
        $this->save();
    }

    public function augmentation_montant_restant($montant)
    {
        $this->montant_restant += $montant;
        $this->save();
    }

    public function listeSouhaits()
    {
        return $this->hasMany(ListeSouhait::class);
    }

    // public function checkDepenseThreshold()
    // {
    //     $montantUtilise = $this->salaire_mensuel - $this->montant_restant;
    //     $pourcentageUtilise = ($montantUtilise / $this->salaire_mensuel) * 100;

    //     if ($pourcentageUtilise >= 50) {
    //         $this->notify(new DepenseAlerte($this->montant_restant, $this->salaire_mensuel));
    //         }
    // }
}
