<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white shadow rounded mt-20">
        <h2 class="text-xl font-semibold mb-4">Add New Patient</h2>

        <form action="{{ route('patients.update', $patient->id) }}" method="POST">
            @method('PUT')
            @csrf


            <div class="grid grid-cols-3 gap-4c ">


                <div class="mb-4">
                    <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="full_name" id="full_name" value="{{ $patient->full_name }}"
                        class="w-full border rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                    <input type="date" name="birthdate" id="birthdate" value="{{ $patient->birthdate }}"
                        class="w-full border rounded p-2" required>
                </div>


                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="gender" id="gender" class="w-full border rounded p-2" value="{{ $patient->gender }} required>
                        <option value="" disabled selected>Select gender</option>
                        <option value=" male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>



            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" id="address" value="{{ $patient->address }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label for="contact_no" class="block text-sm font-medium text-gray-700">Contact No</label>
                    <input type="text" name="contact_no" id="contact_no" value="{{ $patient->contact_no }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label for="blood_type" class="block text-sm font-medium text-gray-700">Blood Type</label>
                    <input type="text" name="blood_type" id="blood_type" value="{{ $patient->blood_type }}"
                        class="w-full border rounded p-2">
                </div>
            </div>


            <div class="mb-4">
                <label for="medical_conditions" class="block text-sm font-medium text-gray-700">Medical
                    Conditions</label>
                <input type="text" name="medical_conditions" id="medical_conditions"
                    value="{{ $patient->medical_conditions }}" rows="3" class="w-full border rounded p-2"></input>
            </div>

            <div class="flex justify-between">
                 <a href="{{ route('patients.index') }}"
                   class="text-gray-600 hover:underline text-sm mt-4">← Back to Patients</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Save Patient
                </button>
            </div>
        </form>
    </div>
</x-app-layout>