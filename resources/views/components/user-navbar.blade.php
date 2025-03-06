<aside class="w-72 bg-white shadow-lg h-screen fixed left-0 transition-all duration-300">
    <!-- Logo avec effet gradient amélioré -->
    <div class="p-6 border-b bg-gradient-to-br from-gray-50 to-white">
        <div class="flex items-center space-x-3">
            <div class="h-12 w-12 rounded-2xl bg-gradient-to-tr from-indigo-600 via-purple-600 to-pink-500 flex items-center justify-center transform transition-transform hover:scale-105 hover:rotate-3">
                <i class="fas fa-wallet text-white text-xl"></i>
            </div>
            <span class="text-xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 bg-clip-text text-transparent hover:from-pink-500 hover:to-indigo-600 transition-all duration-300">
                MoneyMind
            </span>
        </div>
    </div>

    <!-- Menu avec effets améliorés -->
    <nav class="p-4 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('dashboard_user') }}" class="group flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 transition-all duration-300">
            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-tr from-indigo-100 to-purple-100 group-hover:from-indigo-200 group-hover:to-purple-200 transition-all duration-300">
                <i class="fas fa-chart-pie text-indigo-600 group-hover:scale-110 transition-transform"></i>
            </div>
            <span class="font-medium group-hover:text-indigo-600 transition-colors">Tableau de bord</span>
        </a>

        <!-- Gestion des revenus (Nouveau) -->
        <a href="{{ route('gestionRevenus') }}" class="group flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gradient-to-r hover:from-yellow-50 hover:to-amber-50 transition-all duration-300">
            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-tr from-yellow-100 to-amber-100 group-hover:from-yellow-200 group-hover:to-amber-200 transition-all duration-300">
                <i class="fas fa-coins text-amber-600 group-hover:scale-110 transition-transform"></i>
            </div>
            <span class="font-medium group-hover:text-amber-600 transition-colors">Gestion des revenus</span>
        </a>

        <!-- Gestion des dépenses -->
        <a href="{{ route('depance') }}" class="group flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 transition-all duration-300">
            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-tr from-green-100 to-emerald-100 group-hover:from-green-200 group-hover:to-emerald-200 transition-all duration-300">
                <i class="fas fa-money-bill-wave text-green-600 group-hover:scale-110 transition-transform"></i>
            </div>
            <span class="font-medium group-hover:text-green-600 transition-colors">Gestion des dépenses</span>
        </a>

        <!-- Suggestions IA -->
        <a href="{{route('suggestion-ai')}}" class="group flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-300">
            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-tr from-blue-100 to-cyan-100 group-hover:from-blue-200 group-hover:to-cyan-200 transition-all duration-300">
                <i class="fas fa-lightbulb text-blue-600 group-hover:scale-110 transition-transform"></i>
            </div>
            <span class="font-medium group-hover:text-blue-600 transition-colors">Suggestions IA</span>
        </a>

        <!-- Liste de souhaits -->
        <a href="{{route('listeSouhait')}}" class="group flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gradient-to-r hover:from-rose-50 hover:to-pink-50 transition-all duration-300">
            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-tr from-rose-100 to-pink-100 group-hover:from-rose-200 group-hover:to-pink-200 transition-all duration-300">
                <i class="fas fa-gift text-rose-600 group-hover:scale-110 transition-transform"></i>
            </div>
            <span class="font-medium group-hover:text-rose-600 transition-colors">Liste de souhaits</span>
        </a>
    </nav>

    <!-- Profil avec effet moderne et bouton déconnexion -->
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t bg-gradient-to-b from-transparent to-white">
        <div class="flex items-center p-3 rounded-xl hover:bg-gray-50 transition-all duration-300 cursor-pointer group mb-3">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=6366f1&color=fff" 
                 class="h-12 w-12 rounded-xl shadow-md group-hover:scale-105 transition-transform" alt="Profile">
            <div class="ml-3">
                <p class="text-sm font-semibold text-gray-700 group-hover:text-indigo-600 transition-colors">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
            </div>
            <i class="fas fa-chevron-right ml-auto text-gray-400 group-hover:text-indigo-600 group-hover:translate-x-1 transition-all"></i>
        </div>

        <!-- Bouton Déconnexion -->
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 flex items-center justify-center space-x-2 transition-colors duration-300">
                <i class="fas fa-sign-out-alt"></i>
                <span>Déconnexion</span>
            </button>
        </form>
    </div>
</aside>
