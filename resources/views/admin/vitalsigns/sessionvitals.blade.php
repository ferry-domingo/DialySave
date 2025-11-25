<x-app-layout>
    <div class="max-w-5xl mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            Vital Signs for Session #{{ $session->id }}
        </h2>

        @if($vitals->count())
            <table class="w-full table-auto border border-gray-300 bg-white rounded shadow">
                <thead class="bg-gray-100 text-sm uppercase text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">Vitals ID</th>
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
                            <td class="px-4 py-2 border text-center">{{ $vital->id }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->blood_pressure }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->heart_rate }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->temperature }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->respiratory_rate }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->weight_before }}</td>
                            <td class="px-4 py-2 border text-center">{{ $vital->weight_after }}</td>
                            <td class="px-4 py-2 border text-center">
                                {{ $vital->created_at ? $vital->created_at->format('M d, Y h:i A') : 'N/A' }}
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('vitals.edit', $vital->id) }}"
                                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">
                                        Edit
                                    </a>
                                    <form action="{{ route('vitals.destroy', $vital->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this lab result?');">
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
        @else
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded mt-4">
                No vital signs recorded for this session.
            </div>
        @endif
          <a href="{{ route('sessions.index') }}"
                   class="text-gray-600 hover:underline text-sm">← Back to Session</a>
    </div>
    
</x-app-layout>
