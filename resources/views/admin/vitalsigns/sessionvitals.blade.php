<x-app-layout>
    <div class="max-w-5xl mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            Vital Signs for Patient: {{ $session->patient->full_name }}
        </h2>
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">
                        {{ session('success') }}
                    </p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" onclick="this.closest('.mb-6').remove()"
                            class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                            <span class="sr-only">Dismiss</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @if($vitals->count())
            <table class="w-full table-auto border border-gray-300 bg-white rounded shadow">
                <thead class="bg-gray-100 text-xs uppercase text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">Blood Pressure</th>
                        <th class="px-4 py-2 border">Heart Rate</th>
                        <th class="px-4 py-2 border">Temperature</th>
                        <th class="px-4 py-2 border">Respiratory Rate</th>
                        <th class="px-4 py-2 border">Weight Before</th>
                        <th class="px-4 py-2 border">Weight After</th>
                        <th class="px-4 py-2 border">Recorded At</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-800">
                    @foreach($vitals as $vital)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2 border text-center">{{ $vital->blood_pressure }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->heart_rate }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->temperature }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->respiratory_rate }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->weight_before }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->weight_after }}</td>
                            <td class="px-4 py-2 border text-center">
                                {{ $vital->created_at ? $vital->created_at->timezone('Asia/Manila')->format('M d, Y h:i A') : 'N/A' }}
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('vitals.edit', $vital->id) }}"
                                        class=" text-blue-600 rounded text-xs">
                                        <i class="fas fa-edit text-sm sm:text-base"></i>
                                    </a>
                                    <form action="{{ route('patients.destroy', $vital->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="openDeleteModal(this.closest('form'))"
                                                    class="text-red-600 hover:text-red-900 transition-colors duration-200"
                                                    title="Delete Patient">
                                                    <i class="fas fa-trash text-sm sm:text-base"></i>
                                                </button>
                                            </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded mt-4">
                No vital signs recorded for this session.
            </div>
        @endif
        <a href="{{ route('sessions.index') }}" class="text-gray-600 hover:underline text-sm">← Back to Session</a>
    </div>
</x-app-layout>