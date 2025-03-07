<?php

namespace App\Services;
use Exception;
use GuzzleHttp\Client;

class AiServices
{
    private $client;
    private $api_key;
    private $api_url;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => false  // Désactive la vérification SSL
        ]);
        $this->api_url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=";
        $this->api_key = "AIzaSyBAWvfO03J-3AjCPiQ9qVbbI8_zTK7uZck";
    }

    public function getAdviceAI($depances)
    {
        $format_depances = "";
        foreach ($depances as $depance) {
            $format_depances .= "type:{$depance->type_depense} titre:{$depance->titre} montant:{$depance->montant}dh categorie:{$depance->categorie->nom} ";
        }

        $data = [
            'contents' => [
                'parts' => [
                    [
                        'text' => "Analyse ces dépenses et donne moi des conseils pour mieux gérer mon argent dans 5 a 6 ligne avec une analyse parfait:  " . $format_depances
                    ]
                ]
            ]
        ];
        
        try {
            $response = $this->client->post($this->api_url.$this->api_key, [
                'json' => $data
            ]);
            
            $responseData = json_decode($response->getBody()->getContents());
            
            //dd($responseData );
           // \Log::info('API Response:', ['response' => $responseData]);
            
            // Vérification et extraction sécurisée des données
            if (isset($responseData->candidates[0]->content->parts[0]->text)) {
                return $responseData->candidates[0]->content->parts[0]->text;
            }
            
            return "Désolé, impossible d'obtenir des conseils pour le moment.";
            
        } catch (Exception $e) {
         //   \Log::error('Erreur API:', ['error' => $e->getMessage()]);
            return "Une erreur s'est produite lors de l'analyse des dépenses.";
        }
    }
}
