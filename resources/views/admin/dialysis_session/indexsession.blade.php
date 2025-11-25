<x-app-layout>
    @role('admin')
    <div class="max-w-7xl mx-auto px-4 py-10">
        @can('add dialysis_session')
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Dialysis Sessions</h2>
                <a href="{{ route('sessions.create') }}"
                   class="bg-green-600 text-white px-5 py-2 rounded-md hover:bg-green-700 transition text-sm">
                    + Add Dialysis Session
                </a>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3 border">Patient</th>
                            <th class="px-4 py-3 border">Date</th>
                            <th class="px-4 py-3 border">Time</th>
                            <th class="px-4 py-3 border">Type</th>
                            <th class="px-4 py-3 border text-center" colspan="4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-800 divide-y divide-gray-200">
                        @forelse ($dialysis_sessions as $session)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $session->patient->full_name }}</td>
                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($session->session_date)->format('F j, Y') }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($session->start_time)->format('g:i A') }}
                                    –
                                    {{ \Carbon\Carbon::parse($session->end_time)->format('g:i A') }}
                                </td>
                                <td class="px-4 py-3">{{ $session->dialysis_type }}</td>

                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('sessions.edit', $session->id) }}"
                                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">
                                            Edit
                                        </a>
                                        <form action="{{ route('sessions.destroy', $session->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this session?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>

                           
                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('vitals.create', ['session' => $session->id]) }}"
                                           class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600 text-xs">
                                            Add Vitals
                                        </a>
                                        <a href="{{ route('sessions.vitals', ['session' => $session->id]) }}"
                                           class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700 text-xs">
                                            View Vitals
                                        </a>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('labs.create', ['session' => $session->id]) }}"
                                           class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600 text-xs">
                                            Add Lab Result
                                        </a>
                                        <a href="{{ route('sessions.labs', ['session' => $session->id]) }}"
                                           class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700 text-xs">
                                            View Lab Result
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                                    No dialysis sessions found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endcan
    </div>
    @endrole
</x-app-layout>
