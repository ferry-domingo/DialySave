<x-app-layout>
    <div class="max-w-xl mx-auto mt-6">
        <form action="{{ route('sessions.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="patient_id" class="block font-semibold mb-1">Patient</label>
                <select name="patient_id" id="patient_id" class="border rounded px-3 py-2 w-full">
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->full_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="session_date" class="block font-semibold mb-1">Session Date</label>
                <input type="date" name="session_date" id="session_date" class="border rounded px-3 py-2 w-full">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="start_time" class="block font-semibold mb-1">Start Time</label>
                    <input type="time" name="start_time" id="start_time" class="border rounded px-3 py-2 w-full">
                </div>

                <div>
                    <label for="end_time" class="block font-semibold mb-1">End Time</label>
                    <input type="time" name="end_time" id="end_time" class="border rounded px-3 py-2 w-full">
                </div>
            </div>

            <div>
                <label for="dialysis_type" class="block font-semibold mb-1">Dialysis Type</label>
                <select name="dialysis_type" id="dialysis_type" class="border rounded px-3 py-2 w-full">
                    <option value="Hemodialysis">Hemodialysis</option>
                    <option value="Peritoneal">Peritoneal</option>
                </select>
            </div>

            <div>
                <label for="notes" class="block font-semibold mb-1">Notes</label>
                <input type="text" name="notes" id="notes" rows="3" class="border rounded px-3 py-2 w-full" placeholder="Optional remarks..."></input>
            </div>
            
            <div class="text-right">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">Create Session</button>
            </div>
            <a href="{{ route('sessions.index') }}"
                   class="text-gray-600 hover:underline text-sm">← Back to Session</a>
        </form>
        
    </div>
</x-app-layout>
