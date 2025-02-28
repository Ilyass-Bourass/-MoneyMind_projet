

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <title>Category Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet">    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-50 font-sans">
    <div class="min-h-screen">
        <x-admin-navbar />

        <main class="pt-16">
           
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex gap-6">
                    <div class="w-1/3">                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-lg font-medium text-gray-900 mb-4">Edit Category</h2>
                            <form action="{{route('categorie.update', $categorie->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="space-y-4">
                                    <div>                                        <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                                        <input value="{{$categorie->nom}}" type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-button shadow-sm focus:ring-custom focus:border-custom sm:text-sm" placeholder="Enter category name">                                    </div>
                                    
                                    
                                    <div class="flex justify-end space-x-3">                                        <button type="button" class="!rounded-button inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">                                            Cancel
                                        </button>
                                        <button type="submit" class="!rounded-button inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-custom hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">                                            Save edited Category
                                        </button>
                                    </div>                                </div>
                            </form>
                        </div>
                    </div>                    <div class="w-2/3">
                        <div class="bg-white shadow rounded-lg">
                            <div class="p-6 border-b border-gray-200">                                <div class="flex items-center justify-between">
                                    <h2 class="text-lg font-medium text-gray-900">Categories</h2>
                                    <div class="relative">
                                        <input type="text" placeholder="Search categories..." class="w-64 pr-10 !rounded-button border-gray-300 shadow-sm focus:ring-custom focus:border-custom sm:text-sm">                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <i class="fas fa-search text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">id_category</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">    
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$category->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$category->nom}}</td>
                                             <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$category->created_at}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <a href="{{route('categorie.edit', $category->id)}}">
                                                    <button class="text-custom hover:text-custom/80 mr-3"><i class="fas fa-edit"></i></button>
                                                </a>
                                                <form action="{{ route('categorie.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-red-800 border-none bg-transparent">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                </form>          

                                            </td>
                                        </tr>
                                        @endforeach
                                                                           </tbody>
                                </table>
                            </div>
                            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">                                <div class="flex-1 flex justify-between sm:hidden">
                                    <button class="!rounded-button relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</button>
                                    <button class="!rounded-button ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</button>
                                </div>
                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">                                    <div>
                                        <p class="text-sm text-gray-700">
                                            Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">12</span> results
                                        </p>                                    </div>
                                    <div>
                                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">                                            <button class="!rounded-button relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">                                                <span class="sr-only">Previous</span>
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <button class="!rounded-button relative inline-flex items-center px-4 py-2 border border-custom bg-custom text-sm font-medium text-white">1</button>
                                            <button class="!rounded-button relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
                                            <button class="!rounded-button relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
                                            <button class="!rounded-button relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">                                                <span class="sr-only">Next</span>
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </nav>
                                    </div>                                </div>
                            </div>
                        </div>
                    </div>                </div>
            </div>
        </main>

       
    </div>
</body>
</html>