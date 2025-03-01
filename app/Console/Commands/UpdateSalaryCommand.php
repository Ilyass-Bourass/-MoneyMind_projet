<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class UpdateSalaryCommand extends Command
{
    protected $signature = 'users:update-salary';
    protected $description = 'Met à jour le montant restant des utilisateurs selon leur date de crédit';

    public function handle()
    {
        $today = Carbon::now()->day;
        
        $users = User::whereNotNull('date_credit')
                    ->whereNotNull('salaire_mensuel')
                    ->where('date_credit', $today)
                    ->get();

        $count = 0;
        foreach ($users as $user) {
            $user->montant_restant += $user->salaire_mensuel;
            $user->save();
            $count++;
            
            $this->info("Salaire mis à jour pour : {$user->name}");
        }

        $this->info("Mise à jour terminée. {$count} utilisateur(s) mis à jour.");
    }
}