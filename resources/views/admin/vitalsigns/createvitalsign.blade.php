<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Record Vital Signs</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('vitals.store') }}" method="POST" class="bg-white p-6 rounded shadow-md grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            <input type="hidden" name="session_id" value="{{ $session->id }}" required>

            <div>
                <label for="blood_pressure" class="block text-sm font-medium text-gray-700 mb-1">Blood Pressure</label>
                <input type="text" name="blood_pressure" id="blood_pressure"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g. 130/85">
            </div>

            <div>
                <label for="heart_rate" class="block text-sm font-medium text-gray-700 mb-1">Heart Rate</label>
                <input type="number" name="heart_rate" id="heart_rate"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g. 78">
            </div>

            <div>
                <label for="temperature" class="block text-sm font-medium text-gray-700 mb-1">Temperature (°C)</label>
                <input type="number" step="0.1" name="temperature" id="temperature"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g. 36.7">
            </div>

            <div>
                <label for="respiratory_rate" class="block text-sm font-medium text-gray-700 mb-1">Respiratory Rate</label>
                <input type="number" name="respiratory_rate" id="respiratory_rate"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g. 18">
            </div>

            <div>
                <label for="weight_before" class="block text-sm font-medium text-gray-700 mb-1">Weight Before (kg)</label>
                <input type="number" step="0.01" name="weight_before" id="weight_before"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g. 65.50">
            </div>

            <div>
                <label for="weight_after" class="block text-sm font-medium text-gray-700 mb-1">Weight After (kg)</label>
                <input type="number" step="0.01" name="weight_after" id="weight_after"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g. 64.80">
            </div>

            <div class="md:col-span-2 flex justify-between items-center mt-4">
                <a href="{{ route('sessions.index') }}"
                   class="text-gray-600 hover:text-blue-600 text-sm underline">← Back to Session</a>
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                    Save Vitals
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
