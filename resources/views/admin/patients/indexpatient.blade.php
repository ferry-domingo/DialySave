<x-app-layout>
    @role('admin')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-8">
            <!-- Header Section -->
            <div class="mb-6 sm:mb-10">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start space-y-4 sm:space-y-0">
                    <div>
                        <h1 class="text-xl sm:text-3xl font-bold text-gray-900">Patient Management</h1>
                        <p class="mt-1 text-sm sm:text-base text-gray-600">Manage patient records and view analytics</p>
                    </div>
                    @can('add patients')
                        <a href="{{ route('patients.create') }}"
                            class="inline-flex items-center justify-center px-4 sm:px-5 py-2 sm:py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 w-full sm:w-auto">
                            <i class="fas fa-user-plus mr-2"></i>
                            <span class="hidden sm:inline">Add New Patient</span>
                        </a>
                    @endcan
                </div>
            </div>

            <!-- Success Notification -->
            @if(session('success'))
                <div class="mb-4 sm:mb-6 bg-green-50 border-l-4 border-green-500 p-3 sm:p-4 rounded-r-lg shadow-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-500 text-lg sm:text-xl"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-xs sm:text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-10">
                <!-- Total Patients Card -->
                <div
                    class="bg-white rounded-lg sm:rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-500">Total Patients</p>
                                <p class="mt-1 text-xl sm:text-3xl font-bold text-gray-900">{{ $totalpatients }}</p>
                            </div>
                            <div class="p-2 sm:p-3 bg-green-100 rounded-full">
                                <i class="fas fa-users text-green-600 text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-50 px-4 sm:px-6 py-2 sm:py-3">
                        <div class="flex items-center text-xs sm:text-sm text-green-700">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>12% from last month</span>
                        </div>
                    </div>
                </div>

                <!-- Male Patients Card -->
                <div
                    class="bg-white rounded-lg sm:rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-500">Male Patients</p>
                                <p class="mt-1 text-xl sm:text-3xl font-bold text-gray-900">{{ $malepatients }}</p>
                            </div>
                            <div class="p-2 sm:p-3 bg-blue-100 rounded-full">
                                <i class="fas fa-mars text-blue-600 text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-50 px-4 sm:px-6 py-2 sm:py-3">
                        <div class="flex items-center text-xs sm:text-sm text-blue-700">
                            <i class="fas fa-equals mr-1"></i>
                            <span>No change</span>
                        </div>
                    </div>
                </div>

                <!-- Female Patients Card -->
                <div
                    class="bg-white rounded-lg sm:rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-500">Female Patients</p>
                                <p class="mt-1 text-xl sm:text-3xl font-bold text-gray-900">{{ $femalepatients }}</p>
                            </div>
                            <div class="p-2 sm:p-3 bg-pink-100 rounded-full">
                                <i class="fas fa-venus text-pink-600 text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-pink-50 px-4 sm:px-6 py-2 sm:py-3">
                        <div class="flex items-center text-xs sm:text-sm text-pink-700">
                            <i class="fas fa-arrow-down mr-1"></i>
                            <span>3% from last month</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Patients Table Section -->
            <div class="bg-white rounded-lg sm:rounded-xl shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-200">
                    <div class="flex flex-col space-y-3 sm:space-y-0 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-800">Patients Directory</h2>
                     <x-search-input></x-search-input>
                    </div>
                </div>

                <div class="relative overflow-x-auto">
                    <table id="patientTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th scope="col"
                                    class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th scope="col"
                                    class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Age</th>
                                <th scope="col"
                                    class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gender</th>
                                <th scope="col"
                                    class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Contact</th>
                                <th scope="col"
                                    class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Blood Type</th>
                                <th scope="col"
                                    class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">
                                    Medical Conditions</th>
                                <th scope="col"
                                    class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" >
                            @forelse($patients as $patient)
                                <tr class="hover:bg-gray-50 transition-colors duration-150" > 
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $patient->patient_id }}
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                        {{ $patient->full_name }}
                                    </td>
                                    <td
                                        class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden sm:table-cell">
                                        {{ \Carbon\Carbon::parse($patient->birthdate)->age }}
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $patient->gender === 'male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                            {{ ucfirst($patient->gender) }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden sm:table-cell">
                                        <span class="truncate max-w-20 sm:max-w-none" title="{{ $patient->contact_no }}">
                                            {{ $patient->contact_no }}
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm hidden sm:table-cell">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            {{ $patient->blood_type ?? '—' }}
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 text-sm text-gray-500 hidden lg:table-cell">
                                        <span class="truncate max-w-20" title="{{ $patient->medical_conditions ?? '—' }}">
                                            {{ $patient->medical_conditions ?? '—' }}
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2 sm:space-x-3">
                                            <a href="{{ route('patients.edit', $patient->id) }}"
                                                class="text-blue-600 hover:text-blue-900 transition-colors duration-150"
                                                title="Edit Patient">
                                                <i class="fas fa-edit text-sm sm:text-base"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="openDeleteModal(this.closest('form'), {name: '{{ $patient->full_name }}', id: '{{ $patient->id }}' })"
                                                    class="text-red-600 hover:text-red-900 transition-colors duration-200"
                                                    title="Delete Patient">
                                                    <i class="fas fa-trash text-sm sm:text-base"></i>
                                                </button>
                                            </form>
                                          
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-3 sm:px-6 py-8 sm:py-12 text-center text-gray-500">
                                        <i class="fas fa-inbox text-3xl sm:text-4xl text-gray-300 mb-2 sm:mb-3"></i>
                                        <p class="text-base sm:text-lg">No patients found</p>
                                        <p class="text-xs sm:text-sm mt-1">Try adjusting your search criteria</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#"
                            class="relative inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </a>
                        <a href="#"
                            class="ml-3 relative inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span
                                    class="font-medium">{{ $patients->count() }}</span> of
                                <span class="font-medium">{{ $patients->total() }}</span> results
                            </p>
                        </div>
                        <div>
                            {{ $patients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole

    
</x-app-layout>