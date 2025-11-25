<x-app-layout>
    @role('admin')
    <div class="max-w-7xl mx-auto px-4 py-6 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div
                class="max-w-xs h-auto rounded overflow-hidden shadow-lg bg-white grid grid-rows-2 place-items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-notes-medical text-green-500 text-2xl mr-2"></i>
                    <h1 class="text-base font-semibold text-green-500">Total Sessions</h1>
                </div>
                <div class="px-4 py-2">
                    <h2 class="font-bold text-lg text-green-600">{{ $totalSessions }}</h2>
                </div>
            </div>
            <div
                class="max-w-xs h-auto rounded overflow-hidden shadow-lg bg-white grid grid-rows-2 place-items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-water text-blue-500 text-2xl mr-2"></i>
                    <h1 class="text-base font-semibold text-blue-500">Hemodialysis</h1>
                </div>
                <div class="px-4 py-2">
                    <h2 class="font-bold text-lg text-blue-600">{{ $hemodialysisCount }}</h2>
                </div>
            </div>
            <div
                class="max-w-xs h-auto rounded overflow-hidden shadow-lg bg-white grid grid-rows-2 place-items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-vial text-purple-500 text-2xl mr-2"></i>
                    <h1 class="text-base font-semibold text-purple-500">Peritoneal Dialysis</h1>
                </div>
                <div class="px-4 py-2">
                    <h2 class="font-bold text-lg text-purple-600">{{ $peritonealCount }}</h2>
                </div>
            </div>
        </div>

        @can('add dialysis_session')
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Dialysis Sessions</h2>
                <a href="{{ route('sessions.create') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add Dialysis Session
                </a>
            </div>

            <div class="overflow-x-auto bg-white shadow rounded">
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                        <tr>
                            <th class="px-4 py-2 border">Patient</th>
                            <th class="px-4 py-2 border">Date</th>
                            <th class="px-4 py-2 border">Time</th>
                            <th class="px-4 py-2 border">Type</th>
                            <th class="px-4 py-2 border">Actions</th>
                            <th class="px-4 py-2 border">Vital sign</th>
                            <th class="px-4 py-2 border">Laboratory</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-gray-800">
                        @forelse ($dialysis_sessions as $session)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $session->patient->full_name }}</td>
                                <td class="px-4 py-2 border">
                                    {{ \Carbon\Carbon::parse($session->session_date)->shiftTimezone('Asia/Manila')->format('F j, Y') }}
                                </td>
                                <td class="px-4 py-2 border">
                                    {{ \Carbon\Carbon::parse($session->start_time)->shiftTimezone('Asia/Manila')->format('g:i A') }}
                                    –
                                    {{ \Carbon\Carbon::parse($session->end_time)->shiftTimezone('Asia/Manila')->format('g:i A') }}
                                </td>
                                <td class="px-4 py-2 border">{{ $session->dialysis_type }}</td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('sessions.edit', $session->id) }}"
                                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs flex items-center">
                                            <i class="fas fa-user-pen mr-1"></i> Edit
                                        </a>
                                        <form action="{{ route('sessions.destroy', $session->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this session?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs flex items-center">
                                                <i class="fas fa-trash mr-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('vitals.create', ['session' => $session->id]) }}"
                                            class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600 text-xs">
                                            Add
                                        </a>
                                        <a href="{{ route('sessions.vitals', ['session' => $session->id]) }}"
                                            class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700 text-xs">
                                            View
                                        </a>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('labs.create', ['session' => $session->id]) }}"
                                            class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600 text-xs">
                                            Add
                                        </a>
                                        <a href="{{ route('sessions.labs', ['session' => $session->id]) }}"
                                            class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700 text-xs">
                                            View 
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="bg-yellow-100 text-yellow-800 p-4 text-center">
                                    No dialysis sessions found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $dialysis_sessions->links() }}
            </div>
        @endcan
    </div>
    @endrole
</x-app-layout>