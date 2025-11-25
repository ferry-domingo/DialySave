<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Add Lab Result</h2>

        <form action="{{ route('labs.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-6">
            @csrf

            <input type="hidden" name="session_id" value="{{ $session->id }}">

            <div>
                <label for="hemoglobin" class="block text-sm font-medium text-gray-700">Hemoglobin (g/dL)</label>
                <input type="number" step="0.1" name="hemoglobin" id="hemoglobin"
                       placeholder="e.g. 13.5"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="creatinine" class="block text-sm font-medium text-gray-700">Creatinine (mg/dL)</label>
                <input type="number" step="0.01" name="creatinine" id="creatinine"
                       placeholder="e.g. 1.2"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="potassium" class="block text-sm font-medium text-gray-700">Potassium (mmol/L)</label>
                <input type="number" step="0.01" name="potassium" id="potassium"
                       placeholder="e.g. 4.5"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                <textarea name="remarks" id="remarks" rows="4"
                          placeholder="e.g. Stable levels. Recommend follow-up in 2 weeks."
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('sessions.index') }}"
                   class="text-gray-600 hover:underline text-sm">← Back to Session</a>

                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                    Save Lab Result
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
