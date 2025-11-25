<x-app-layout>
    <div class="max-w-3xl mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Edit Vital Signs</h2>

        <form action="{{ route('vitals.update', $vital->id) }}" method="POST" class="grid grid-cols-2 gap-4 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <input type="hidden" name="session_id" value="{{ $vital->session_id }}">

            <div>
                <label for="blood_pressure" class="block font-semibold mb-1">Blood Pressure</label>
                <input type="text" name="blood_pressure" id="blood_pressure"
                    value="{{ old('blood_pressure', $vital->blood_pressure) }}"
                    class="border rounded px-3 py-2 w-full" placeholder="e.g. 130/85">
            </div>

            <div>
                <label for="heart_rate" class="block font-semibold mb-1">Heart Rate</label>
                <input type="number" name="heart_rate" id="heart_rate"
                    value="{{ old('heart_rate', $vital->heart_rate) }}"
                    class="border rounded px-3 py-2 w-full" placeholder="e.g. 78">
            </div>

            <div>
                <label for="temperature" class="block font-semibold mb-1">Temperature (°C)</label>
                <input type="number" step="0.1" name="temperature" id="temperature"
                    value="{{ old('temperature', $vital->temperature) }}"
                    class="border rounded px-3 py-2 w-full" placeholder="e.g. 36.7">
            </div>

            <div>
                <label for="respiratory_rate" class="block font-semibold mb-1">Respiratory Rate</label>
                <input type="number" name="respiratory_rate" id="respiratory_rate"
                    value="{{ old('respiratory_rate', $vital->respiratory_rate) }}"
                    class="border rounded px-3 py-2 w-full" placeholder="e.g. 18">
            </div>

            <div>
                <label for="weight_before" class="block font-semibold mb-1">Weight Before (kg)</label>
                <input type="number" step="0.01" name="weight_before" id="weight_before"
                    value="{{ old('weight_before', $vital->weight_before) }}"
                    class="border rounded px-3 py-2 w-full" placeholder="e.g. 65.50">
            </div>

            <div>
                <label for="weight_after" class="block font-semibold mb-1">Weight After (kg)</label>
                <input type="number" step="0.01" name="weight_after" id="weight_after"
                    value="{{ old('weight_after', $vital->weight_after) }}"
                    class="border rounded px-3 py-2 w-full" placeholder="e.g. 64.80">
            </div>

            <div class="col-span-2 text-right">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">Update Vitals</button>
            </div>
        </form>
    </div>
</x-app-layout>
