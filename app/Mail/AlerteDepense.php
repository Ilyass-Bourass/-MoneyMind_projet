<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlerteDepense extends Mailable
{
    use Queueable, SerializesModels;

    public $nomUtilisateur;
    public $montant;

    public function __construct($nomUtilisateur, $montant)
    {
        $this->nomUtilisateur = $nomUtilisateur;
        $this->montant = $montant;
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject('Alerte Dépense - 50% Atteint')
                    ->view('emails.alerte')
                    ->with([
                        'nomUtilisateur' => $this->nomUtilisateur,
                        'montant' => $this->montant,
                    ]);
    }
}
