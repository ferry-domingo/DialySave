<x-app-layout>
    @role('admin')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-2 sm:py-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-4">
            <!-- Header Section -->
            <div class="mb-4 sm:mb-6">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-2">
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Appointments</h1>
                        <p class="text-xs sm:text-sm text-gray-600 mt-1">Manage patient appointments</p>
                    </div>
                    @can('add appointment')
                        <a href="{{ route('appointments.create') }}"
                            class="inline-flex items-center justify-center px-3 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-xs sm:text-sm font-medium rounded-lg shadow hover:shadow transition-all duration-200 w-full sm:w-auto">
                            <i class="fas fa-plus mr-1 text-xs"></i>
                            <span class="hidden sm:inline">Appointment</span>
                        </a>
                    @endcan
                </div>
            </div>
          
            <!-- Stats Cards Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4 mb-4 sm:mb-6">
                <!-- Total Appointments Card -->
                <div class="bg-white rounded-lg shadow hover:shadow transition-shadow">
                    <div class="p-3 sm:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-500">Total</p>
                                <p class="text-lg sm:text-xl font-bold text-gray-900 mt-1">{{ $totalAppointments }}</p>
                            </div>
                            <div class="p-1.5 sm:p-2 bg-blue-100 rounded-full">
                                <i class="fas fa-calendar-check text-blue-600 text-xs sm:text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scheduled Card -->
                <div class="bg-white rounded-lg shadow hover:shadow transition-shadow">
                    <div class="p-3 sm:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-500">Scheduled</p>
                                <p class="text-lg sm:text-xl font-bold text-gray-900 mt-1">{{ $scheduledCount }}</p>
                            </div>
                            <div class="p-1.5 sm:p-2 bg-yellow-100 rounded-full">
                                <i class="fas fa-clock text-yellow-600 text-xs sm:text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completed Card -->
                <div class="bg-white rounded-lg shadow hover:shadow transition-shadow">
                    <div class="p-3 sm:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-500">Completed</p>
                                <p class="text-lg sm:text-xl font-bold text-gray-900 mt-1">{{ $completedCount }}</p>
                            </div>
                            <div class="p-1.5 sm:p-2 bg-green-100 rounded-full">
                                <i class="fas fa-check-circle text-green-600 text-xs sm:text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Canceled Card -->
                <div class="bg-white rounded-lg shadow hover:shadow transition-shadow">
                    <div class="p-3 sm:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-500">Canceled</p>
                                <p class="text-lg sm:text-xl font-bold text-gray-900 mt-1">{{ $canceledCount }}</p>
                            </div>
                            <div class="p-1.5 sm:p-2 bg-red-100 rounded-full">
                                <i class="fas fa-times-circle text-red-600 text-xs sm:text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointments Table Section -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-3 py-2 sm:px-4 sm:py-3 border-b border-gray-200">
                    <div class="flex flex-col space-y-2 sm:space-y-0 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-sm sm:text-base font-bold text-gray-800">Appointments</h2>
                        <div class="w-full sm:w-auto">
                            <x-search-input class="w-full sm:w-48 text-xs" />
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200" id="patientTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-2 sm:px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Patient</th>
                                <th scope="col" class="px-2 sm:px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date</th>
                                <th scope="col" class="px-2 sm:px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Time</th>
                                <th scope="col" class="px-2 sm:px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col" class="px-2 sm:px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($appointments as $appointment)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-2 sm:px-3 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-6 w-6 sm:h-8 sm:w-8">
                                                <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                                    <i class="fas fa-user text-blue-600 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="ml-2 sm:ml-3">
                                                <div class="text-xs sm:text-sm font-medium text-gray-900 truncate max-w-[80px] sm:max-w-none">
                                                    {{ $appointment->patient->full_name ?? 'Unknown' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-2 sm:px-3 py-2 whitespace-nowrap text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($appointment->date)->format('M j') }}
                                    </td>
                                    <td class="px-2 sm:px-3 py-2 whitespace-nowrap text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($appointment->time)->format('g:i') }}
                                    </td>
                                    <td class="px-2 sm:px-3 py-2 whitespace-nowrap">
                                        <span class="px-2 py-0.5 inline-flex text-xs leading-4 font-semibold rounded-full
                                            {{ $appointment->status === 'scheduled' ? 'bg-yellow-100 text-yellow-800' : 
                                               ($appointment->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                               'bg-red-100 text-red-800') }}">
                                            {{ ucfirst(($appointment->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-2 sm:px-3 py-2 whitespace-nowrap">
                                        <div class="flex space-x-1">
                                            <form action="{{ route('appointments.cancel', $appointment->id) }}" 
                                                method="POST"
                                                onsubmit="return confirm('Cancel?');"
                                                class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                    class="text-red-600 hover:text-red-900 p-0.5"
                                                    title="Cancel">
                                                    <i class="fas fa-times text-xs"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('appointments.complete', $appointment->id) }}" 
                                                method="POST"
                                                onsubmit="return confirm('Complete?');"
                                                class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                    class="text-green-600 hover:text-green-900 p-0.5"
                                                    title="Complete">
                                                    <i class="fas fa-check text-xs"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('appointments.edit', $appointment->id) }}"
                                                class="text-blue-600 hover:text-blue-900 p-0.5"
                                                title="Edit">
                                                <i class="fas fa-edit text-xs"></i>
                                            </a>
                                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="openDeleteModal(this.closest('form'))"
                                                    class="text-red-600 hover:text-red-900 p-0.5"
                                                    title="Delete">
                                                    <i class="fas fa-trash text-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                        <i class="fas fa-calendar-times text-2xl text-gray-300 mb-2"></i>
                                        <p class="text-sm">No appointments found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-3 py-2 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row items-center justify-between">
                        <div class="text-xs text-gray-700 text-center sm:text-left mb-1 sm:mb-0">
                            Showing {{ $appointments->firstItem() }}-{{ $appointments->lastItem() }} of {{ $appointments->total() }}
                        </div>
                        <div>
                            {{ $appointments->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
</x-app-layout>