

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Revenus - MoneyMind</title>
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
                    <h1 class="text-2xl font-bold text-gray-900">Mes Revenus Additionnels</h1>
                    <p class="text-gray-600">Gérez vos sources de revenus supplémentaires</p>
                </div>

                <!-- Formulaire d'ajout -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Ajouter un nouveau revenu</h2>
                    <form action="{{ route('gestionRevenus.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                                <input name="titre" type="text" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                                       placeholder="Ex: Freelance"
                                       required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Montant (DH)</label>
                                <input name="montant" type="number" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                                       placeholder="1000"
                                       required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                                    rows="3"
                                    placeholder="Décrivez la source de ce revenu..."
                                    required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-emerald-600 text-white py-2 px-4 rounded-lg hover:bg-emerald-700 transition duration-200 flex items-center justify-center space-x-2">
                            <i class="fas fa-plus"></i>
                            <span>Ajouter le revenu</span>
                        </button>
                    </form>
                </div>

                <!-- Liste des revenus (Exemple statique) -->
                <div class="space-y-4">
                    <!-- Exemple de revenu 1 -->
                    @foreach($Revenus as $revenu)
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $revenu->nom}}</h3>
                                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800">
                                        {{ $revenu->montant}} DH
                                    </span>
                                </div>
                                <p class="text-gray-600 mt-2">{{ $revenu->description }}</p>
                                <p class="text-sm text-gray-500 mt-2">
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    Ajouté le {{ $revenu->created_at->format('d/m/y') }}
                                </p>
                            </div>
                            <div class="flex space-x-2">
                                <form action="{{route('gestionsRevenus.edit',$revenu->id)}}">
                                    <button type='submit' class="p-2 text-gray-400 hover:text-emerald-600 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </form>
                                <form action="{{ route('gestionsRevenus.destroy',$revenu->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-2 text-gray-400 hover:text-red-600 transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                </div>
                        </div>
                    </div>
                @endforeach
                    
                   
                </div>

                <!-- Résumé des revenus -->
                <div class="mt-8 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl p-6 text-white">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="text-lg font-semibold">Total des revenus additionnels</h4>
                            <p class="text-emerald-100">Ce mois-ci</p>
                        </div>
                        <div class="text-2xl font-bold">
                            {{$totalRevenus}} DH
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
