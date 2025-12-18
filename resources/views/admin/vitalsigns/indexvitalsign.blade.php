<x-app-layout>
    <div class="max-w-6xl mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Vital Signs Records</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($vitals->count())
            <div class="overflow-x-auto bg-white rounded shadow">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <tr>
                            <th class="px-4 py-2 border">Session ID</th>
                            <th class="px-4 py-2 border">Blood Pressure</th>
                            <th class="px-4 py-2 border">Heart Rate</th>
                            <th class="px-4 py-2 border">Temperature</th>
                            <th class="px-4 py-2 border">Respiratory Rate</th>
                            <th class="px-4 py-2 border">Weight Before</th>
                            <th class="px-4 py-2 border">Weight After</th>
                            <th class="px-4 py-2 border">Recorded At</th>
                             <th class="px-4 py-2 border">Action </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-800">
                        @foreach($vitals as $vital)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center">{{ $vital->id }}</td>
                                <td class="px-4 py-2 border text-center">{{ $vital->blood_pressure }}</td>
                                <td class="px-4 py-2 border text-center">{{ $vital->heart_rate }}</td>
                                <td class="px-4 py-2 border text-center">{{ $vital->temperature }}</td>
                                <td class="px-4 py-2 border text-center">{{ $vital->respiratory_rate }}</td>
                                <td class="px-4 py-2 border text-center">{{ $vital->weight_before }}</td>
                                <td class="px-4 py-2 border text-center">{{ $vital->weight_after }}</td>
                                <td class="px-4 py-2 border text-center">{{ $vital->created_at->format('M d, Y h:i A') }}</td>
                                <td class="px-4 py-2  flex space-x-2">
                                <a href="{{ route('vitals.edit', $vital->id) }}"
                                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('vitals.destroy', $vital->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
                No vital signs recorded yet.
            </div>
        @endif
    </div>
</x-app-layout>
