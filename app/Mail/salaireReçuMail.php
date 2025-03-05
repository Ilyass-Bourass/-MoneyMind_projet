<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SalaireReçuMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * 
     */

    public $salaire;
    public $salaire_sauve;
    public $nomUtilisateur;
    public function __construct($nomUtilsateur,$salaire,$salaire_sauve){
        $this->salaire=$salaire;
        $this->salaire_sauve=$salaire_sauve;
        $this->nomUtilisateur=$nomUtilsateur;
    }
   

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Salaire Reçu Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject('Vous avez reçu votre salaire')
                    ->view('Salaire.salaireReçuMail')
                    ->with([
                        'nomUtilisateur' => $this->nomUtilisateur,
                        'salaire' => $this->salaire,
                        'salaire_sauve'=>$this->salaire_sauve
                    ]);
    }
}
