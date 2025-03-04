<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DepenseAlerte extends Notification
{
    use Queueable;

    private $montantRestant;
    private $salaireMensuel;

    /**
     * Crée une nouvelle instance de notification.
     */
    public function __construct($montantRestant, $salaireMensuel)
    {
        $this->montantRestant = $montantRestant;
        $this->salaireMensuel = $salaireMensuel;
    }

    /**
     * Détermine les canaux de notification.
     */
    public function via(object $notifiable): array
    {
        return ['mail']; // On envoie uniquement un e-mail
    }

    /**
     * Construire le contenu de l'e-mail.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('⚠️ Alerte Dépense : Budget Critique !')
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line("Votre solde restant est inférieur à **50% de votre salaire mensuel**.")
            ->line("💰 **Montant restant :** {$this->montantRestant} MAD")
            ->line("💸 **Salaire mensuel :** {$this->salaireMensuel} MAD")
            ->line("⚠️ Faites attention à vos dépenses pour éviter des difficultés financières.")
            ->action('Voir mes dépenses', url('/')) // Remplace par l’URL réelle de ton site
            ->line('Merci d\'utiliser MoneyMind.');
    }

    /**
     * Convertir la notification en tableau (si besoin).
     */
    public function toArray(object $notifiable): array
    {
        return [
            'montant_restant' => $this->montantRestant,
            'salaire_mensuel' => $this->salaireMensuel,
        ];
    }
}
