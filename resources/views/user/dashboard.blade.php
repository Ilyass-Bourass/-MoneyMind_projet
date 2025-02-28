<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - MoneyMind</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <x-user-navbar />

        <!-- Contenu Principal -->
        <main class="flex-1 ml-72 p-6">
            <!-- En-tête avec bouton déconnexion -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Bonjour, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-600">Voici un aperçu de vos finances</p>
                </div>
                
            </div>

            <div class="flex gap-6">
                <!-- Colonne de gauche : Statistiques -->
                <div class="w-1/2 space-y-6">
                    <!-- Statistiques Principales en 2x2 -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Salaire Mensuel -->
                        <div class="bg-white rounded-xl shadow-sm p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="bg-green-50 rounded-lg p-2">
                                    <i class="fas fa-money-bill-wave text-green-600"></i>
                                </div>
                                <span class="text-sm text-gray-500">Salaire Mensuel</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">{{$mon_salaire}} DH</h3>
                        </div>

                        <!-- Solde Restant -->
                        <div class="bg-white rounded-xl shadow-sm p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="bg-blue-50 rounded-lg p-2">
                                    <i class="fas fa-wallet text-blue-600"></i>
                                </div>
                                <span class="text-sm text-gray-500">Solde Restant</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">{{$Montant_restant}} DH</h3>
                        </div>

                        <!-- Objectif Épargne -->
                        <div class="bg-white rounded-xl shadow-sm p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="bg-purple-50 rounded-lg p-2">
                                    <i class="fas fa-piggy-bank text-purple-600"></i>
                                </div>
                                <span class="text-sm text-gray-500">Objectif Épargne</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">100€</h3>
                            <div class="mt-2 bg-gray-200 rounded-full h-1.5">
                                <div class="bg-purple-600 h-1.5 rounded-full" style="width:50%"></div>
                            </div>
                        </div>

                        <!-- Catégorie Principal -->
                        <div class="bg-white rounded-xl shadow-sm p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="bg-red-50 rounded-lg p-2">
                                    <i class="fas fa-chart-pie text-red-600"></i>
                                </div>
                                <span class="text-sm text-gray-500">Dépense Principale</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Alimentation</h3>
                            <p class="text-sm text-gray-500">300 €</p>
                        </div>
                    </div>

                    <!-- Légende détaillée -->
                    <div class="bg-white rounded-xl shadow-sm p-4">
                        <h3 class="text-md font-semibold text-gray-900 mb-3">Détails des Catégories</h3>
                        <div class="space-y-3" id="legendeDetaillee">
                            <!-- La légende sera remplie par JavaScript -->
                        </div>
                    </div>
                </div>

                <!-- Colonne de droite : Graphique -->
                <div class="w-1/2 bg-white rounded-xl shadow-sm p-4">
                    <h3 class="text-md font-semibold text-gray-900 mb-3">Répartition des Dépenses</h3>
                    <div class="flex items-center justify-center">
                        <canvas id="depensesChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Données des dépenses
        const depensesData = {
            labels: ['Alimentation', 'Transport', 'Loisirs', 'Factures', 'Shopping'],
            datasets: [{
                data: [300, 150, 100, 200, 250],
                backgroundColor: [
                    'rgba(99, 102, 241, 0.8)',    // Indigo
                    'rgba(16, 185, 129, 0.8)',    // Emerald
                    'rgba(249, 115, 22, 0.8)',    // Orange
                    'rgba(239, 68, 68, 0.8)',     // Rouge
                    'rgba(168, 85, 247, 0.8)'     // Violet
                ],
                borderColor: [
                    'rgb(99, 102, 241)',
                    'rgb(16, 185, 129)',
                    'rgb(249, 115, 22)',
                    'rgb(239, 68, 68)',
                    'rgb(168, 85, 247)'
                ],
                borderWidth: 2,
                borderRadius: 8,
                spacing: 10,
                hoverOffset: 15
            }]
        };

        // Calcul du total
        const total = depensesData.datasets[0].data.reduce((a, b) => a + b, 0);

        // Configuration du graphique
        const config = {
            type: 'pie',  // Changement pour un graphique en secteurs
            data: depensesData,
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const value = context.raw;
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${value}€ (${percentage}%)`;
                            }
                        }
                    }
                },
                animation: {
                    animateRotate: true,
                    animateScale: true
                }
            }
        };

        // Création du graphique
        const myChart = new Chart(
            document.getElementById('depensesChart'),
            config
        );

        // Création de la légende détaillée avec interactivité
        const legende = document.getElementById('legendeDetaillee');
        depensesData.labels.forEach((label, index) => {
            const montant = depensesData.datasets[0].data[index];
            const pourcentage = ((montant / total) * 100).toFixed(1);
            const couleur = depensesData.datasets[0].backgroundColor[index];
            
            const legendeItem = document.createElement('div');
            legendeItem.className = 'flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 cursor-pointer';
            legendeItem.innerHTML = `
                <div class="flex items-center space-x-3">
                    <div class="w-3 h-3 rounded" style="background-color: ${couleur}"></div>
                    <span class="font-medium text-sm">${label}</span>
                </div>
                <div class="text-right">
                    <span class="font-bold text-sm">${montant}€</span>
                    <span class="text-xs text-gray-500 ml-2">${pourcentage}%</span>
                </div>
            `;

            // Ajout d'interactivité
            legendeItem.addEventListener('mouseenter', () => {
                myChart.setActiveElements([{datasetIndex: 0, index: index}]);
                myChart.update();
            });

            legendeItem.addEventListener('mouseleave', () => {
                myChart.setActiveElements([]);
                myChart.update();
            });

            legende.appendChild(legendeItem);
        });
    </script>
</body>
</html>