<x-app-layout>
    @role('admin')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-4 sm:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-6 sm:mb-10">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Dialysis Sessions</h1>
                        <p class="mt-1 sm:mt-2 text-sm sm:text-base text-gray-600">Manage dialysis sessions and track patient treatments</p>
                    </div>
                    @can('add dialysis_session')
                        <a href="{{ route('sessions.create') }}"
                            class="inline-flex items-center justify-center px-4 sm:px-5 py-2 sm:py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 w-full sm:w-auto">
                            <i class="fas fa-plus mr-2 text-sm sm:text-base"></i> 
                            <span class="hidden sm:inline">Add Session</span>
                            <span class="sm:hidden">Add</span>
                        </a>
                    @endcan
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-10">
                <!-- Total Sessions Card -->
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-500">Total Sessions</p>
                                <p class="mt-1 text-2xl sm:text-3xl font-bold text-gray-900">{{ $totalSessions }}</p>
                            </div>
                            <div class="p-2 sm:p-3 bg-green-100 rounded-full">
                                <i class="fas fa-notes-medical text-green-600 text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-50 px-4 sm:px-6 py-2 sm:py-3">
                        <div class="flex items-center text-xs sm:text-sm text-green-700">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>8% from last week</span>
                        </div>
                    </div>
                </div>

                <!-- Hemodialysis Card -->
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-500">Hemodialysis</p>
                                <p class="mt-1 text-2xl sm:text-3xl font-bold text-gray-900">{{ $hemodialysisCount }}</p>
                            </div>
                            <div class="p-2 sm:p-3 bg-blue-100 rounded-full">
                                <i class="fas fa-water text-blue-600 text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-50 px-4 sm:px-6 py-2 sm:py-3">
                        <div class="flex items-center text-xs sm:text-sm text-blue-700">
                            <i class="fas fa-equals mr-1"></i>
                            <span>Stable</span>
                        </div>
                    </div>
                </div>

                <!-- Peritoneal Dialysis Card -->
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-500">Peritoneal Dialysis</p>
                                <p class="mt-1 text-2xl sm:text-3xl font-bold text-gray-900">{{ $peritonealCount }}</p>
                            </div>
                            <div class="p-2 sm:p-3 bg-purple-100 rounded-full">
                                <i class="fas fa-vial text-purple-600 text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-purple-50 px-4 sm:px-6 py-2 sm:py-3">
                        <div class="flex items-center text-xs sm:text-sm text-purple-700">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>12% from last week</span>
                        </div>
                    </div>
                </div>
            </div>
               @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                    {{ session('success') }}
                </p>
            </div>
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" onclick="this.closest('.mb-6').remove()" class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @endif
            <!-- Sessions Table Section -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-200">
                    <div class="flex flex-col space-y-3 sm:space-y-0 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-800">Sessions Directory</h2>
                        <div class="w-full sm:w-auto">
                            <x-search-input class="w-full"></x-search-input>
                        </div>
                        
                    </div>
                </div>

                <!-- Mobile View -->
                <div class="md:hidden">
                    <div class="p-4">
                        <div class="space-y-4">
                            @forelse ($dialysis_sessions as $session)
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <!-- Patient Info -->
                                    <div class="flex items-center mb-3">
                                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-blue-600 text-sm"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-medium text-gray-900 text-sm">{{ $session->patient->full_name }}</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Session Details -->
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <p class="text-xs text-gray-500">Date</p>
                                            <p class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($session->created_at)->shiftTimezone('Asia/Manila')->format('M j, Y') }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Time</p>
                                            <p class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($session->created_at)->timezone('Asia/Manila')->format('g:i A') }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <p class="text-xs text-gray-500">Type</p>
                                            <span
                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $session->dialysis_type === 'hemodialysis' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                                {{ ucfirst($session->dialysis_type) }}
                                            </span>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Status</p>
                                            <span
                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                    {{ $session->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-gray-800' }}">
                                                {{ ucfirst($session->status) }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!-- Actions -->
                                    <div class="flex flex-wrap gap-2 pt-3 border-t border-gray-100">
                                        <a href="{{ route('sessions.show', $session->id) }}"
                                            class="flex-1 flex items-center justify-center px-3 py-2 bg-blue-50 text-blue-600 rounded-lg text-xs font-medium hover:bg-blue-100 transition-colors">
                                            <i class="fas fa-eye mr-1"></i> View
                                        </a>
                                        <a href="{{ route('sessions.edit', $session->id) }}"
                                            class="flex-1 flex items-center justify-center px-3 py-2 bg-gray-50 text-gray-600 rounded-lg text-xs font-medium hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                        <button onclick="openDeleteModal(document.querySelector('form[action=\"{{ route('sessions.destroy', $session->id) }}\"]))"
                                            class="flex-1 flex items-center justify-center px-3 py-2 bg-red-50 text-red-600 rounded-lg text-xs font-medium hover:bg-red-100 transition-colors">
                                            <i class="fas fa-trash mr-1"></i> Delete
                                        </button>
                                    </div>
                                    
                                    <!-- Additional Actions -->
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        <a href="{{ route('vitals.create', ['session' => $session->id]) }}"
                                            class="flex-1 flex items-center justify-center px-3 py-2 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-medium hover:bg-indigo-100 transition-colors">
                                            <i class="fas fa-plus-circle mr-1"></i> Add Vitals
                                        </a>
                                        <a href="{{ route('sessions.vitals', ['session' => $session->id]) }}"
                                            class="flex-1 flex items-center justify-center px-3 py-2 bg-gray-50 text-gray-600 rounded-lg text-xs font-medium hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-chart-line mr-1"></i> View Vitals
                                        </a>
                                        <a href="{{ route('labs.create', ['session' => $session->id]) }}"
                                            class="flex-1 flex items-center justify-center px-3 py-2 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-medium hover:bg-indigo-100 transition-colors">
                                            <i class="fas fa-plus-circle mr-1"></i> Add Labs
                                        </a>
                                        <a href="{{ route('sessions.labs', ['session' => $session->id]) }}"
                                            class="flex-1 flex items-center justify-center px-3 py-2 bg-gray-50 text-gray-600 rounded-lg text-xs font-medium hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-flask mr-1"></i> View Labs
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <i class="fas fa-inbox text-3xl text-gray-300 mb-3"></i>
                                    <p class="text-gray-500">No dialysis sessions found</p>
                                    <p class="text-sm text-gray-400 mt-1">Try adjusting your search criteria or create a new session</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Desktop/Tablet View -->
                <div class="hidden md:block">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200" id="patientTable">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Patient</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Time</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Vital Signs</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Laboratory</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($dialysis_sessions as $session)
                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-8 w-8 sm:h-10 sm:w-10">
                                                    <div
                                                        class="h-8 w-8 sm:h-10 sm:w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                        <i class="fas fa-user text-blue-600 text-sm sm:text-base"></i>
                                                    </div>
                                                </div>
                                                <div class="ml-3 sm:ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $session->patient->full_name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($session->created_at)->shiftTimezone('Asia/Manila')->format('M j, Y') }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($session->created_at)->timezone('Asia/Manila')->format('g:i A') }}         
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-1 sm:px-3 sm:py-1 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-full 
                                                    {{ $session->dialysis_type === 'hemodialysis' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                                {{ ucfirst($session->dialysis_type) }}
                                            </span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-1 sm:px-3 sm:py-1 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-full
                                                    {{ $session->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-gray-800' }}">
                                                {{ ucfirst($session->status) }}
                                            </span>
                                        </td> 
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('sessions.show', $session->id) }}"
                                                    class="text-blue-600 hover:text-blue-900 transition-colors duration-150">
                                                    <i class="fas fa-eye text-sm"></i>
                                                </a>
                                                <a href="{{ route('sessions.edit', $session->id) }}"
                                                    class="text-blue-600 hover:text-blue-900 transition-colors duration-150">
                                                    <i class="fas fa-edit text-sm"></i>
                                                </a>
                                                <form action="{{ route('sessions.destroy', $session->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this session?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        onclick="openDeleteModal(this.closest('form'))"
                                                        class="text-red-600 hover:text-red-900 transition-colors duration-200"
                                                        title="Delete Session">
                                                        <i class="fas fa-trash text-sm"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('vitals.create', ['session' => $session->id]) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 transition-colors duration-150">
                                                    <i class="fas fa-plus-circle text-sm"></i>
                                                </a>
                                                <a href="{{ route('sessions.vitals', ['session' => $session->id]) }}"
                                                    class="text-gray-600 hover:text-gray-900 transition-colors duration-150">
                                                    <i class="fas fa-chart-line text-sm"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('labs.create', ['session' => $session->id]) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 transition-colors duration-150">
                                                    <i class="fas fa-plus-circle text-sm"></i>
                                                </a>
                                                <a href="{{ route('sessions.labs', ['session' => $session->id]) }}"
                                                    class="text-gray-600 hover:text-gray-900 transition-colors duration-150">
                                                    <i class="fas fa-flask text-sm"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 sm:px-6 py-16 text-center text-gray-500">
                                            <i class="fas fa-inbox text-3xl text-gray-300 mb-3"></i>
                                            <p class="text-lg">No dialysis sessions found</p>
                                            <p class="text-sm mt-1">Try adjusting your search criteria or create a new session</p>
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
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </a>
                            <a href="#"
                                class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </a>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Showing <span class="font-medium">1</span> to <span
                                        class="font-medium">{{ $dialysis_sessions->count() }}</span> of
                                    <span class="font-medium">{{ $dialysis_sessions->total() }}</span> results
                                </p>
                            </div>
                            <div>
                                {{ $dialysis_sessions->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
</x-app-layout>