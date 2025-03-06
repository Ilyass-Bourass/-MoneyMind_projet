<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Souhaits - MoneyMind</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <x-user-navbar />

        <!-- Contenu Principal -->
        <main class="flex-1 ml-72 p-6">
            <div class="max-w-4xl mx-auto">
                <!-- En-tête -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900">Mes Souhaits</h1>
                    <p class="text-gray-600">Gérez vos objectifs d'épargne</p>
                </div>

                <!-- Formulaire d'ajout -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Ajouter un nouveau souhait</h2>
                    <form action="{{route('listeSouhait.store')}}" method="POST" class="space-y-4">
                        @csrf
                       
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nom du souhait</label>
                                <input type="text" 
                                       name="nom" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nom') border-red-500 @enderror" 
                                       placeholder="Ex: Nouvelle voiture"
                                       value="{{ old('nom') }}"
                                       required>
                                @error('nom')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Montant objectif (DH)</label>
                                <input type="number" 
                                       name="montant" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('montant') border-red-500 @enderror" 
                                       placeholder="10000"
                                       value="{{ old('montant') }}"
                                       min="0"
                                       step="0.01"
                                       required>
                                @error('montant')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                            <i class="fas fa-plus mr-2"></i>Ajouter le souhait
                        </button>
                    </form>
                </div>

                <!-- Messages de succès -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Liste des souhaits -->
                <div class="space-y-4">
                    <!-- Exemple de souhait 1 -->
                    @foreach ($listeSouhaits as $souhait)
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{$souhait->nom}}</h3>
                                <p class="text-gray-500">salaire sauvgardé: {{$salaire_sauve}} DH <br> prix_souhait: {{$souhait->montant}} DH</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('listeSouhait.destroy', $souhait->id)}} " method="POST">   
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-gray-400 hover:text-red-600">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <div>
                                    <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200">
                                        Progression
                                    </span>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs font-semibold inline-block text-blue-600">
                                        {{number_format(min(($salaire_sauve / $souhait->montant * 100), 100), 2)}}%
                                    </span>
                                </div>
                            </div>
                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                                <div style="width:{{$salaire_sauve / $souhait->montant * 100}}% " class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                            </div>
                            @if(($salaire_sauve / $souhait->montant * 100) >= 100)
                                <div class="text-center mt-4">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                                        <i class="fas fa-shopping-cart mr-2"></i>
                                        Acheter maintenant
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                    
                @endforeach
                    
                </div>
            </div>
        </main>
    </div>
</body>
</html>