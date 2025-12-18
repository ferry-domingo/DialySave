<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 mb-4">
                    <i class="fas fa-user-edit text-blue-600 text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Edit Patient Information</h1>
                <p class="mt-2 text-gray-600">Update patient details and medical information</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Form Header -->
                <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <h2 class="text-xl font-semibold text-gray-800">Patient Details</h2>
                </div>

                <!-- Form Body -->
                <form action="{{ route('patients.update', $patient->id) }}" method="POST" class="px-6 py-5">
                    @method('PUT')
                    @csrf

                    <div class="space-y-6">
                        <!-- Row 1: Full Name, Birthdate, Gender -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Full Name -->
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user mr-1 text-blue-500"></i> Full Name
                                </label>
                                <input type="text" name="full_name" id="full_name" value="{{ $patient->full_name }}"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                    required>
                            </div>

                            <!-- Birthdate -->
                            <div>
                                <label for="birthdate" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-calendar-alt mr-1 text-blue-500"></i> Birthdate
                                </label>
                                <input type="date" name="birthdate" id="birthdate" value="{{ $patient->birthdate }}"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                    required>
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-venus-mars mr-1 text-blue-500"></i> Gender
                                </label>
                                <select name="gender" id="gender"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                    required>
                                    <option value="" disabled>Select gender</option>
                                    <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="other" {{ $patient->gender == 'other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 2: Address, Contact No, Blood Type -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-map-marker-alt mr-1 text-blue-500"></i> Address
                                </label>
                                <input type="text" name="address" id="address" value="{{ $patient->address }}"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                    placeholder="Enter full address">
                            </div>

                            <!-- Contact No -->
                            <div>
                                <label for="contact_no" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-phone mr-1 text-blue-500"></i> Contact No
                                </label>
                                <input type="text" name="contact_no" id="contact_no" value="{{ $patient->contact_no }}"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                    placeholder="0912-345-6789" maxlength="12">
                            </div>

                            <!-- Blood Type -->
                            <div>
                                <label for="blood_type" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-tint mr-1 text-blue-500"></i> Blood Type
                                </label>
                                <select name="blood_type" id="blood_type"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                    <option value="" disabled>Select blood type</option>
                                    <option value="A+" {{ $patient->blood_type == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ $patient->blood_type == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ $patient->blood_type == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ $patient->blood_type == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="AB+" {{ $patient->blood_type == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ $patient->blood_type == 'AB-' ? 'selected' : '' }}>AB-</option>
                                    <option value="O+" {{ $patient->blood_type == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ $patient->blood_type == 'O-' ? 'selected' : '' }}>O-</option>
                                </select>
                            </div>
                        </div>

                        <!-- Medical Conditions -->
                        <div>
                            <label for="medical_conditions" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-notes-medical mr-1 text-blue-500"></i> Medical Conditions
                            </label>
                            <textarea name="medical_conditions" id="medical_conditions" rows="4"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                placeholder="List any existing medical conditions, allergies, or medications">{{ $patient->medical_conditions }}</textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                            <a href="{{ route('patients.index') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">
                                <i class="fas fa-arrow-left mr-2"></i> Back to Patients
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out transform hover:-translate-y-0.5">
                                <i class="fas fa-save mr-2"></i> Update Patient
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const contactInput = document.getElementById("contact_no");

            if (contactInput) {
                contactInput.addEventListener("input", function (e) {
                    let value = e.target.value.replace(/\D/g, ""); // remove non-digits

                    // limit to 11 digits
                    if (value.length > 11) value = value.slice(0, 11);

                    // insert dash after 4 and 7 digits: 0912-345-6789
                    if (value.length > 4) {
                        value = value.slice(0, 4) + '-' + value.slice(4);
                    }
                    if (value.length > 8) {
                        value = value.slice(0, 8) + '-' + value.slice(8);
                    }

                    e.target.value = value;
                });

                // Format existing value on load
                let existingValue = contactInput.value.replace(/\D/g, "");
                if (existingValue.length > 4) {
                    existingValue = existingValue.slice(0, 4) + '-' + existingValue.slice(4);
                }
                if (existingValue.length > 8) {
                    existingValue = existingValue.slice(0, 8) + '-' + existingValue.slice(8);
                }
                contactInput.value = existingValue;
            }
        });
    </script>


</x-app-layout>