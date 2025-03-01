<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Dépenses - MoneyMind</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <x-user-navbar />

        <!-- Contenu Principal -->
        <main class="flex-1 ml-72 p-8">
            <!-- En-tête -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Gestion des Dépenses</h1>
                    <p class="text-gray-600">Gérez vos dépenses quotidiennes et récurrentes</p>
                </div>
                <button onclick="openModal()" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter une dépense</span>
                </button>
            </div>

            <!-- Sections des dépenses avec style moderne -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Dépenses Quotidiennes -->
                <div class="bg-gradient-to-br from-blue-100 to-cyan-50 rounded-2xl shadow-lg overflow-hidden transform hover:scale-[1.02] transition-transform duration-300">
                    <!-- En-tête avec total stylisé -->
                    <div class="bg-white/60 backdrop-blur-md p-8 border-b border-blue-200">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <h2 class="text-xl font-bold text-gray-900 flex items-center">
                                    <i class="fas fa-clock text-blue-700 mr-3 text-lg"></i>
                                    Dépenses Quotidiennes
                                </h2>
                                <p class="text-sm text-blue-600 mt-1">Total des dépenses quotidiennes par rapport au salaire mensuel</p>
                            </div>
                            <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white px-6 py-3 rounded-xl shadow-lg flex items-center space-x-3">
                                <span class="text-sm font-medium opacity-90">Total:</span>
                                <span class="text-xl font-bold">{{number_format($somme_depense_quotidienne, 2)}}dh</span>
                            </div>
                        </div>
                        <!-- Barre de progression améliorée -->
                        <div class="mt-6 relative">
                            <div class="bg-blue-100 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-2.5 rounded-full w-[{{$pourcentage_depense_quotidienne}}%] relative">
                                    <div class="absolute -right-1 -top-1 w-4 h-4 bg-blue-700 rounded-full shadow-md"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Liste des dépenses -->
                    <div class="p-6 space-y-4 max-h-[500px] overflow-y-auto custom-scrollbar">
                        @forelse ($depances_ponctuelles as $depense)
                        <div class="flex items-center justify-between p-5 rounded-2xl bg-white shadow-md hover:shadow-xl transition-all duration-300 border border-blue-50">
                            <div class="flex items-center space-x-5">
                                <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-3 rounded-xl shadow-md">
                                    <i class="fas fa-shopping-cart text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-lg">{{$depense->titre}}</h3>
                                    <p class="text-sm text-gray-600 mt-1">{{$depense->description}}</p>
                                    <span class="text-xs text-blue-600 font-medium">{{$depense->categorie->nom}}</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-6">
                                <div class="text-right">
                                    <p class="font-bold text-xl text-gray-900">{{number_format($depense->montant, 2)}}dh</p>
                                    <p class="text-sm text-blue-700">{{$depense->created_at->format('d M Y')}}</p>
                                </div>
                                <div class="flex space-x-3">
                                    <button onclick="openEditModal({{$depense->id}})" class="p-2.5 bg-blue-50 rounded-lg text-blue-700 hover:bg-blue-100 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('depance.destroy', $depense->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette dépense ?')" 
                                                class="p-2.5 bg-red-50 rounded-lg text-red-700 hover:bg-red-100 transition-colors">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <i class="fas fa-receipt text-blue-200 text-5xl mb-4"></i>
                            <p class="text-gray-500">Aucune dépense quotidienne enregistrée</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Dépenses Récurrentes -->
                <div class="bg-gradient-to-br from-purple-100 to-pink-50 rounded-2xl shadow-lg overflow-hidden transform hover:scale-[1.02] transition-transform duration-300">
                    <div class="bg-white/60 backdrop-blur-md p-8 border-b border-purple-200">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <h2 class="text-xl font-bold text-gray-900 flex items-center">
                                    <i class="fas fa-repeat text-purple-700 mr-3 text-lg"></i>
                                    Dépenses Récurrentes
                                </h2>
                                <p class="text-sm text-purple-600 mt-1">Total des dépenses récurrentes par rapport au salaire mensuel</p>
                            </div>
                            <div class="bg-gradient-to-r from-purple-600 to-purple-800 text-white px-6 py-3 rounded-xl shadow-lg flex items-center space-x-3">
                                <span class="text-sm font-medium opacity-90">Total:</span>
                                <span class="text-xl font-bold">{{number_format($somme_depense_recurrente, 2)}}dh</span>
                            </div>
                        </div>
                        <!-- Barre de progression améliorée -->
                        <div class="mt-6 relative">
                            <div class="bg-purple-100 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-purple-500 to-purple-700 h-2.5 rounded-full w-[{{$pourcentage_depense_recurrente}}%] relative">
                                    <div class="absolute -right-1 -top-1 w-4 h-4 bg-purple-700 rounded-full shadow-md"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-4 max-h-[500px] overflow-y-auto custom-scrollbar">
                        @forelse ($depances_reccurentes as $depense)
                        <div class="flex items-center justify-between p-5 rounded-2xl bg-white shadow-md hover:shadow-xl transition-all duration-300 border border-purple-50">
                            <div class="flex items-center space-x-5">
                                <div class="bg-gradient-to-br from-purple-600 to-purple-800 p-3 rounded-xl shadow-md">
                                    <i class="fas fa-calendar-check text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-lg">{{ $depense->titre }}</h3>
                                    <p class="text-sm text-gray-600 mt-1">{{$depense->description}}</p>
                                    <span class="text-xs text-purple-600 font-medium">{{$depense->categorie->nom}}</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-6">
                                <div class="text-right">
                                    <p class="font-bold text-xl text-gray-900">{{number_format($depense->montant, 2)}}dh</p>
                                    <p class="text-sm text-purple-700">{{$depense->created_at->format('d M Y')}}</p>
                                </div>
                                <div class="flex space-x-3">
                                    <button onclick="openEditModal({{$depense->id}})" class="p-2.5 bg-purple-50 rounded-lg text-purple-700 hover:bg-purple-100 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('depance.destroy', $depense) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette dépense ?')" 
                                                class="p-2.5 bg-red-50 rounded-lg text-red-700 hover:bg-red-100 transition-colors">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <i class="fas fa-calendar-times text-purple-200 text-5xl mb-4"></i>
                            <p class="text-gray-500">Aucune dépense récurrente enregistrée</p>
                        </div>
                        @endforelse
                    </div>
                    </div>
            </div>

            <!-- Modal Ajout Dépense -->
            <div id="depenseModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-xl bg-white">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Nouvelle Dépense</h3>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <form action="{{ route('depance.store') }}" method="POST" id="depenseForm" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Type de dépense</label>
                            <select name="type_depanse" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="quotidienne">Quotidienne</option>
                                <option value="recurrente">Récurrente</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                            <input name="titre" type="text" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Montant (€)</label>
                            <input name="montant" type="number" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                            <select name='id_categorie'  class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                                Annuler
                            </button>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Modification Dépense -->
            <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-xl bg-white">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Modifier la Dépense</h3>
                        <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <form id="editForm" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Type de dépense</label>
                            <select name="type" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="quotidienne">Quotidienne</option>
                                <option value="recurrente">Récurrente</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                            <input type="text" name="titre" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Montant (€)</label>
                            <input type="number" name="montant" step="0.01" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                            <select name="categorie_id" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="1">Alimentation</option>
                                <option value="2">Transport</option>
                                <option value="3">Logement</option>
                                <option value="4">Loisirs</option>
                                <option value="5">Factures</option>
                                <option value="6">Shopping</option>
                                <option value="7">Santé</option>
                                <option value="8">Autres</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                                Annuler
                            </button>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        function openModal() {
            document.getElementById('depenseModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('depenseModal').classList.add('hidden');
        }

        // Fermer le modal si on clique en dehors
        document.getElementById('depenseModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        function openEditModal(id) {
            document.getElementById('editModal').classList.remove('hidden');
            // Ici, vous pouvez ajouter la logique pour pré-remplir le formulaire avec les données existantes
            document.getElementById('editForm').action = `/depenses/${id}`;
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Fermer le modal si on clique en dehors
        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });
    </script>
</body>
</html>
