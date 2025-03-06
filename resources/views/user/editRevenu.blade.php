

@php 
//dd($gestionRevenu);
@endphp

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
                {{-- <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900">Mes Revenus Additionnels</h1>
                    <p class="text-gray-600">Gérez vos sources de revenus supplémentaires</p>
                </div> --}}

                <!-- Formulaire de modification de revenu -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Modifier un  revenu</h2>
                    <form action="{{ route('gestionRevenus.update',$gestionRevenu->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                                <input value="{{ $gestionRevenu->nom}}" name="titre" type="text" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                                       placeholder="Ex: Freelance"
                                       required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Montant (DH)</label>
                                <input value={{ $gestionRevenu->montant}} name="montant" type="number" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                                       placeholder="1000"
                                       required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea  name="description" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                                    rows="3"
                                    placeholder="Décrivez la source de ce revenu..."
                                    required>{{$gestionRevenu->description}}</textarea>
                        </div>

                            <button type="submit" class="w-full bg-emerald-600 text-white py-2 px-4 rounded-lg hover:bg-emerald-700 transition duration-200 flex items-center justify-center space-x-2">
                                <i class="fas fa-plus"></i>
                                <span>Modifer le revenu</span>
                            </button>
                    </form>
                </div>

                
                
            </div>
        </main>
    </div>
</body>
</html>
