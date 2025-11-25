<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            Lab Result for Patient: {{ $session->patient->full_name }}
        </h2>
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded"> 
                {{session('success')}}
            </div>
        @endif
        @if($lab_results->count())
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-4 py-2 border">Hemoglobin</th>
                        <th class="px-4 py-2 border">Creatinine</th>
                        <th class="px-4 py-2 border">Potassium</th>
                        <th class="px-4 py-2 border">Remarks</th>
                        <th class="px-4 py-2 border">Recorded At</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-xs text-gray-800">
                    @foreach($lab_results as $result)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2 border text-center">{{ $result->hemoglobin ?? '—' }}</td>
                            <td class="px-4 py-2 border text-center">{{ $result->creatinine ?? '—' }}</td>
                            <td class="px-4 py-2 border text-center">{{ $result->potassium ?? '—' }}</td>
                            <td class="px-4 py-2 border">{{ $result->remarks ?? '—' }}</td>
                            <td class="px-4 py-2 border text-center">
                                {{ $result->created_at ? $result->created_at->timezone('Asia/Manila')->format('M d, Y h:i A') : '—' }}
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('labs.edit', $result->id) }}"
                                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">
                                        Edit
                                    </a>
                                    <form action="{{ route('labs.destroy', $result->id) }}" method="POST"
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
                    @else
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-500">
                                No lab results found.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
           <a href="{{ route('sessions.index') }}"
                   class="text-gray-600 hover:underline text-sm">← Back to Session</a>
      
    </div>
</x-app-layout>
