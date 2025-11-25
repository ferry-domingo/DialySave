<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8 px-4 ">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New User</h2>

        <form action="{{ route('users.store') }}" method="POST" class="bg-white p-6 rounded shadow grid grid-cols-2 gap-4">
            @csrf

            <div class="col-span-2">
                <label for="role" class="block font-semibold mb-1">Role</label>
                <select name="role" id="role" required class="border rounded px-3 py-2 w-full">
                    <option value="" disabled selected>Select Role..</option>
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="staff">Staff</option>
                    <option value="patient">Patient</option>
                </select>
            </div>

            <div>
                <label for="name" class="block font-semibold mb-1">Full Name</label>
                <input type="text" name="name" id="name" placeholder="Full Name" required class="border rounded px-3 py-2 w-full">
            </div>

            <div>
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input type="text" name="email" id="email" placeholder="Email" class="border rounded px-3 py-2 w-full">
            </div>

            <div class="col-span-2 text-right mt-4 flex justify-between">
                 <a href="{{ route('users.index') }}"
                   class="text-gray-600 hover:underline text-sm mt-4">← Back to Users</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Create User</button>
            </div>
        </form>

        @if(session('created_users'))
            <h2 class="text-xl font-bold text-gray-800 mt-10 mb-4">Recently Created Users</h2>

            <div class="overflow-x-auto bg-white rounded shadow">
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <tr>
                            <th class="px-4 py-2 border">Role</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Password</th>
                            <th class="px-4 py-2 border">Email</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-800">
                        @foreach (session('created_users') as $user)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center">{{ $user['role'] }}</td>
                                <td class="px-4 py-2 border text-center">{{ $user['name'] }}</td>
                                <td class="px-4 py-2 border text-center font-bold text-red-600">{{ $user['password'] }}</td>
                                <td class="px-4 py-2 border text-center">{{ $user['email'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
