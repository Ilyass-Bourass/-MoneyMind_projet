<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeSouhait extends Model
{
    /** @use HasFactory<\Database\Factories\ListeSouhaitFactory> */
    use HasFactory;
    protected $fillable = ['nom', 'montant', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
