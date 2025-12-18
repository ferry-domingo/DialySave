<x-app-layout>
    @role('admin')
    <div class="max-w-7xl mx-auto px-4 py-8">
        @can('add users')
            <!-- Responsive Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">User Management</h2>
                <a href="{{ route('users.create') }}"
                   class="w-full sm:w-auto bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition text-sm text-center">
                    + Add User
                </a>
            </div>

            <!-- Mobile-First Card Layout -->
            <div class="md:hidden space-y-4">
                @foreach ($users as $user)
                    <div class="bg-white rounded-lg shadow p-4">
                        <div class="mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">Role</span>
                            <p class="text-sm text-gray-800">{{ $user->getRoleNames()->implode(', ') ?: 'No Role Assigned' }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">Name</span>
                            <p class="text-sm text-gray-800">{{ $user->name }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <span class="text-xs font-semibold text-gray-500 uppercase">Email</span>
                            <p class="text-sm text-gray-800">{{ $user->email }}</p>
                        </div>
                        
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="flex-1 bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs text-center">
                                Edit
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="flex-1 bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Desktop Table Layout -->
            <div class="hidden md:block overflow-x-auto bg-white rounded shadow">
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <tr>
                            <th class="px-4 py-2 border">Role</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-gray-800">
                        @foreach ($users as $user)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center">
                                    {{ $user->getRoleNames()->implode(', ') ?: 'No Role Assigned' }}
                                </td>
                                <td class="px-4 py-2 border">{{ $user->name }}</td>
                                <td class="px-4 py-2 border">{{ $user->email }}</td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">
                                            Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endcan
    </div>
    @endrole
</x-app-layout>