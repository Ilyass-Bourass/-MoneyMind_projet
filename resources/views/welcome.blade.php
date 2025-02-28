<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoneyMind - Gérez votre argent intelligemment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-indigo-100 via-purple-50 to-teal-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-indigo-600">MoneyMind</span>
                </div>
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-indigo-600 hover:text-indigo-800 px-3 py-2 rounded-lg transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800 px-3 py-2 rounded-lg transition">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Inscription</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h1 class="text-5xl font-bold text-gray-900 mb-6">
                    Prenez le contrôle de vos finances
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    MoneyMind vous aide à gérer votre budget, suivre vos dépenses et atteindre vos objectifs financiers avec l'aide de l'intelligence artificielle.
                </p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition transform hover:scale-105">
                        Commencer gratuitement
                    </a>
                    <a href="#features" class="bg-white text-indigo-600 px-8 py-3 rounded-lg hover:bg-gray-50 transition transform hover:scale-105 border border-indigo-200">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Fonctionnalités principales</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Suivi des dépenses</h3>
                    <p class="text-gray-600">Suivez facilement vos dépenses et visualisez où va votre argent.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Objectifs d'épargne</h3>
                    <p class="text-gray-600">Définissez des objectifs et suivez votre progression en temps réel.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Analyses IA</h3>
                    <p class="text-gray-600">Recevez des suggestions personnalisées basées sur vos habitudes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-8">Prêt à mieux gérer vos finances ?</h2>
            <a href="{{ route('register') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-lg hover:bg-gray-100 transition inline-block transform hover:scale-105">
                Créer un compte gratuit
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto py-12 px-4 text-center">
            <p class="text-gray-500">&copy; {{ date('Y') }} MoneyMind. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>