<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-4 sm:py-8 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-6 sm:mb-10">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4 ">
                    <div>
                        <h1 class="text-xl sm:text-3xl font-bold text-gray-900">Dialysis Sessions</h1>
                        <p class="mt-1 text-sm sm:text-base text-gray-600">Manage dialysis sessions and track patient treatments</p>
                    </div>
                    @can('add dialysis_session')
                        <a href="{{ route('sessions.create') }}"
                           class="inline-flex items-center justify-center px-4 py-2 sm:px-5 sm:py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 w-full sm:w-auto">
                            <i class="fas fa-plus mr-2"></i> <span class="hidden sm:inline">Add Session</span>
                        </a>
                    @endcan
                </div>
            </div>

            <!-- Sessions Table Section -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-200">
                    <div class="flex flex-col space-y-3 sm:space-y-0 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-800">Sessions Directory</h2>
                        <x-search-input class="w-full sm:w-auto"></x-search-input>
                    </div>
                </div>

                <!-- Mobile Card View -->
                <div class="md:hidden">
                    @forelse ($dialysis_sessions as $session)
                        <div class="p-4 border-b border-gray-200 hover:bg-gray-50 transition-colors duration-150">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-user text-blue-600"></i>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="font-medium text-gray-900">{{ $session->patient?->full_name ?? 'N/A' }}</h3>
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $session->dialysis_type === 'hemodialysis' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                            {{ ucfirst($session->dialysis_type) }}
                                        </span>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="text-sm text-gray-600">
                                            <i class="far fa-calendar-alt mr-1.5"></i>
                                            {{ \Carbon\Carbon::parse($session->session_date)->shiftTimezone('Asia/Manila')->format('M j, Y') }}
                                        </p>
                                        <p class="text-sm text-gray-600">
                                            <i class="far fa-clock mr-1.5"></i>
                                            {{ \Carbon\Carbon::parse($session->start_time)->shiftTimezone('Asia/Manila')->format('g:i A') }}
                                            -
                                            {{ \Carbon\Carbon::parse($session->end_time)->shiftTimezone('Asia/Manila')->format('g:i A') }}
                                        </p>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('patient-session.show', $session->id) }}"
                                           class="inline-flex items-center text-blue-600 hover:text-blue-900 transition-colors duration-150 text-sm font-medium">
                                            <i class="fas fa-eye mr-1.5"></i> View Session
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-12 text-center">
                            <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
                            <p class="text-lg text-gray-500">No dialysis sessions found</p>
                            <p class="text-sm text-gray-400 mt-1">Try adjusting your search criteria or create a new session</p>
                        </div>
                    @endforelse
                </div>

                <!-- Desktop Table View -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200" id="patientTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($dialysis_sessions as $session)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                    <i class="fas fa-user text-blue-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $session->patient?->full_name ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($session->session_date)->shiftTimezone('Asia/Manila')->format('M j, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($session->start_time)->shiftTimezone('Asia/Manila')->format('g:i A') }}
                                        -
                                        {{ \Carbon\Carbon::parse($session->end_time)->shiftTimezone('Asia/Manila')->format('g:i A') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $session->dialysis_type === 'hemodialysis' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                            {{ ucfirst($session->dialysis_type) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('patient-session.show', $session->id) }}"
                                               class="text-blue-600 hover:text-blue-900 transition-colors duration-150">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
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
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </a>
                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            {{-- <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">{{ $dialysis_sessions->count() }}</span> of 
                                <span class="font-medium">{{ $dialysis_sessions->total() }}</span> results
                            </p> --}}
                        </div>
                        <div>
                            {{-- {{ $dialysis_sessions->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>