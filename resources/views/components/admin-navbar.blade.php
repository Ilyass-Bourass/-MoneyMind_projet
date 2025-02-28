<nav class="bg-white shadow-sm fixed w-full z-50">
        <div class="max-w-8xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-8 w-auto" src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png" alt="Logo"/>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('admin') }}" class="border-custom text-custom inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Tableau de Bord
                        </a>
                        <a href="{{ route('user') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Gestion des Utilisateurs
                        </a>
                        <a href="{{ route('categorie') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Gestion des Catégories
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('profile.edit') }}" class="p-2 rounded-full text-gray-500 hover:text-gray-600 mr-2">
                        <i class="fas fa-user-edit text-xl"></i>
                    </a>
                </div>
                <div class="flex items-center pr-4 color-gray-500">
                    
                 <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="p-2 rounded-full text-gray-500 hover:text-gray-600">
                        <i class="fas fa-sign-out-alt text-xl"></i>
                    </button>

                 </form>
                    
                </div>
            </div>
        </div>
    </nav>