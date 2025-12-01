<x-app-layout>
    @role('admin')
    <div class="max-w-7xl mx-auto px-4 py-8 space-y-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div
                class="max-w-xs h-auto rounded overflow-hidden shadow-lg bg-white grid grid-rows-2 place-items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-hospital-user text-green-500 text-2xl mr-2"></i>
                    <h1 class="text-base font-semibold text-green-500">Total Patients</h1>
                </div>
                <div class="px-4 py-2">
                    <h2 class="font-bold text-lg text-green-600">{{ $totalpatients }}</h2>
                </div>
            </div>

            <div
                class="max-w-xs h-auto rounded overflow-hidden shadow-lg bg-white grid grid-rows-2 place-items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-mars text-blue-500 text-2xl mr-2"></i>
                    <h1 class="text-base font-semibold text-blue-500">Male Patients</h1>
                </div>
                <div class="px-4 py-2">
                    <h2 class="font-bold text-lg text-blue-600">{{ $malepatients }}</h2>
                </div>
            </div>

            <div
                class="max-w-xs h-auto rounded overflow-hidden shadow-lg bg-white grid grid-rows-2 place-items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-venus text-pink-500 text-2xl mr-2"></i>
                    <h1 class="text-base font-semibold text-pink-500">Female Patients</h1>
                </div>
                <div class="px-4 py-2">
                    <h2 class="font-bold text-lg text-pink-600">{{ $femalepatients }}</h2>
                </div>
            </div>
        </div>



        @can('add patients')
            <div class="flex justify-end">
                <a href="{{ route('patients.create') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm flex items-center">
                    <i class="fas fa-user-plus mr-2"></i> Add Patient
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-2 rounded border border-green-300 mt-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="overflow-x-auto bg-white shadow rounded mt-0">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800 px-2">Patients List</h2>
                     <input type="text" id="searchInput" placeholder="Search patients..." class="text-xs border-gray-300 px-14 m-2 rounded-lg ps-3">
                </div>
               
                <table id="patientTable" class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Full Name</th>
                            <th class="px-4 py-2 border">Birthdate</th>
                            <th class="px-4 py-2 border">Gender</th>
                            <th class="px-4 py-2 border">Contact</th>
                            <th class="px-2 py-2 border">Blood Type</th>
                            <th class="px-4 py-2 border">Medical Conditions</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-gray-800">
                        @forelse($patients as $patient)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center">{{ $patient->id }}</td>
                                <td class="px-4 py-2 border">{{ $patient->full_name }}</td>
                                <td class="px-4 py-2 border">{{ $patient->birthdate }}</td>
                                <td class="px-4 py-2 border capitalize">{{ $patient->gender }}</td>
                                <td class="px-4 py-2 border">{{ $patient->contact_no }}</td>
                                <td class="px-4 py-2 border">{{ $patient->blood_type ?? '—' }}</td>
                                <td class="px-4 py-2 border">{{ $patient->medical_conditions ?? '—' }}</td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('patients.edit', $patient->id) }}"
                                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs flex items-center">
                                            <i class="fas fa-user-pen mr-1"></i>
                                        </a>
                                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs flex items-center">
                                                <i class="fas fa-trash mr-1"></i>
                                            </button>
                                
                                        </form>
                                        <button onclick="
                                        printJS()"><i class="fas fa-print"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="bg-yellow-100 text-yellow-800 p-4 text-center">
                                    No patients found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $patients->links() }}
            </div>
        @endcan
    </div>
    @endrole

    @role('patient')
    <div class="max-w-3xl mx-auto mt-10 px-4">
        <h1 class="text-xl font-semibold text-gray-800">Welcome, Patient!</h1>
        <p class="text-gray-600 mt-2">You can view your dialysis sessions and vital signs here.</p>
    </div>
    @endrole
   
</x-app-layout>