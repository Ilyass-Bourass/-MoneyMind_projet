<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Depance;
use Carbon\Carbon;
use App\Mail\SalaireReçuMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class UpdateSalaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:update-salary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mise à jour automatique du montant restant selon la date de crédit';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->day;
        
       Log::info("Exécution de la commande de mise à jour des salaires. Jour actuel : " . $today);

        $users = User::where('date_credit', $today)->get();
        $count = 0;

        foreach ($users as $user) {
            Depance::delete_depenses_quotidiennes($user->id);
            
            $user->salaire_sauve += $user->montant_restant;
            $user->montant_restant = $user->salaire_mensuel;
            $user->save();
            
            $count++;
            Log::info("Salaire mis à jour pour l'utilisateur : {$user->name}");
            Mail::to($user->email)->send(new SalaireReçuMail($user->name,$user->salaire_mensuel,$user->salaire_sauve));
            $this->info("Mise à jour terminée. {$count} utilisateur(s) mis à jour.");
        }
       
    }
}
