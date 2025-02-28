<!DOCTYPE html><html lang="fr"><head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tableau de Bord Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-50 min-h-screen">
  <x-admin-navbar />
    <main class="pt-16">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-gray-900">Tableau de Bord</h1>
                <p class="mt-2 text-sm text-gray-700">Vue d&#39;ensemble des statistiques et analyses des utilisateurs</p>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
                <div class="bg-gradient-to-br from-blue-50 to-white overflow-hidden shadow rounded-lg border border-blue-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-users text-blue-500 text-3xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Utilisateurs Totaux
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{$nbr_users}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-white overflow-hidden shadow rounded-lg border border-purple-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-chart-line text-purple-500 text-3xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Taux d&#39;Engagement
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            67.8%
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-white overflow-hidden shadow rounded-lg border border-green-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-user-plus text-green-500 text-3xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Nouveaux Utilisateurs
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            +2,846
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-orange-50 to-white overflow-hidden shadow rounded-lg border border-orange-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-folder-open text-orange-500 text-3xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Catégories Actives
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{$nbr_categories}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-8">
                <div class="bg-white shadow rounded-lg border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">Croissance des Utilisateurs</h3>
                        <div class="mt-2" id="userGrowthChart" style="height: 300px;"></div>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">Distribution par Catégorie</h3>
                        <div class="mt-2" id="categoryChart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userGrowthChart = echarts.init(document.getElementById('userGrowthChart'));
            const categoryChart = echarts.init(document.getElementById('categoryChart'));
            const userGrowthOption = {
                animation: false,
                tooltip: {
                    trigger: 'axis'
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil']
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    data: [820, 932, 901, 934, 1290, 1330, 1520],
                    type: 'line',
                    smooth: true,
                    lineStyle: {
                        color: '#4F46E5'
                    },
                    areaStyle: {
                        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                            offset: 0,
                            color: 'rgba(79, 70, 229, 0.3)'
                        }, {
                            offset: 1,
                            color: 'rgba(79, 70, 229, 0.1)'
                        }])
                    }
                }]
            };
            const categoryOption = {
                animation: false,
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left'
                },
                series: [{
                    type: 'pie',
                    radius: '50%',
                    data: [
                        { value: 1048, name: 'Marketing' },
                        { value: 735, name: 'Ventes' },
                        { value: 580, name: 'Support' },
                        { value: 484, name: 'R&D' }
                    ],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            };
            userGrowthChart.setOption(userGrowthOption);
            categoryChart.setOption(categoryOption);
            window.addEventListener('resize', function() {
                userGrowthChart.resize();
                categoryChart.resize();
            });
        });
    </script>
