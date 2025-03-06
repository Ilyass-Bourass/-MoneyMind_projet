<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionRevenus extends Model
{
    /** @use HasFactory<\Database\Factories\GestionRevenusFactory> */
    use HasFactory;
    protected $fillable=['user_id','nom','description','montant'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}

