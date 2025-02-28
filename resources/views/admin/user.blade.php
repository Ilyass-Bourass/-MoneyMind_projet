<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet">
    <script
        src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1">
    </script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000"
        data-border-radius="small"></script>
</head>

<body class="bg-gray-50 min-h-screen font-['Inter']">
    <x-admin-navbar />
    <main class="pt-16">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="px-4 py-4 sm:px-0">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-custom bg-opacity-10 rounded-md p-3">
                                    <i class="fas fa-users text-custom text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
                                        <dd class="text-3xl font-semibold text-gray-900">2,453</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-green-100 rounded-md p-3"> <i
                                        class="fas fa-user-check text-green-600 text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Active Users</dt>
                                        <dd class="text-3xl font-semibold text-gray-900">2,104</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-red-100 rounded-md p-3"> <i
                                        class="fas fa-user-times text-red-600 text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Inactive Users</dt>
                                        <dd class="text-3xl font-semibold text-gray-900">349</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-xl font-semibold text-gray-900">All Users</h2>
                                <div class="flex space-x-4">
                                    <div class="relative">
                                        <input type="text" placeholder="Search users..."
                                            class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-custom focus:border-custom">
                                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                    </div> <select
                                        class="border border-gray-300 rounded-lg text-gray-700 h-10 pl-4 pr-8 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                        <option>All Status</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            User</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Registration Date</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Last Login</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                        <i class="fas fa-user text-gray-400"></i>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $user->name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $user->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $user->created_at->format('d/m/Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2h</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-600 hover:text-red-900">
                                                        <i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-xl font-semibold text-gray-900">Inactive Users</h2>
                                <button
                                    class="!rounded-button bg-red-600 text-white px-4 py-2 text-sm font-medium hover:bg-red-700">
                                    <i class="fas fa-trash mr-2"></i>Bulk Delete
                                </button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <input type="checkbox"
                                                    class="rounded border-gray-300 text-custom focus:ring-custom">
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                User</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Last Active</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Inactive Duration</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <input type="checkbox"
                                                    class="rounded border-gray-300 text-custom focus:ring-custom">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                        <i class="fas fa-user text-gray-400"></i>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Michael Brown
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                michael.b@example.com</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Nov 15, 2023
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">60 days</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <button class="text-red-600 hover:text-red-900"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <div id="deleteModal" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Delete User</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Are you sure you want to delete this user? This action
                                    cannot be undone.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"> <button type="button"
                        class="!rounded-button w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
                    <button type="button"
                        class="!rounded-button mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.fa-trash').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('deleteModal').classList.remove('hidden');
            });
        });

        document.querySelectorAll('#deleteModal button').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('deleteModal').classList.add('hidden');
            });
        });
    </script>
</body>

</html>
