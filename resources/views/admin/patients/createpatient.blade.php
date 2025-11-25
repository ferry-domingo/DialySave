<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white shadow rounded  mt-20">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Patient</h2>

        <form action="{{ route('patients.store') }}" method="POST" class="space-y-6">
            @csrf



            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="full_name" id="full_name" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                    <input type="date" name="birthdate" id="birthdate" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="gender" id="gender" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="" disabled selected>Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>


            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" id="address" class="w-full border rounded border-gray-300 px-3 py-2">
                </div>
                <div>
                    <label for="contact_no" class="block text-sm font-medium text-gray-700">Contact No</label>
                    <input type="text" name="contact_no" id="contact_no" class="w-full border  border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label for="blood_type" class="block text-sm font-medium text-gray-700">Blood Type</label>
                    <select name="blood_type" id="blood_type" class="w-full border rounded border-gray-300 px-3 py-2">
                        <option value="" disabled selected>Select blood type</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="medical_conditions" class="block text-sm font-medium text-gray-700">Medical
                    Conditions</label>
                <textarea type="text" name="medical_conditions" id="medical_conditions" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>

            <div class="flex justify-between">
                 <a href="{{ route('patients.index') }}"
                   class="text-gray-600 hover:underline text-sm mt-4">← Back to Patients</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Save Patient
                </button>
            </div>
        </form>
    </div>
</x-app-layout>