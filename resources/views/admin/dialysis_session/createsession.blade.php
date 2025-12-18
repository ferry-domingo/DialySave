<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Create New Session</h1>
                            <p class="text-blue-100 mt-1">Schedule a dialysis session for a patient</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form action="{{ route('sessions.store') }}" method="POST" class="px-8 py-8 space-y-6">
                    @csrf

                    <!-- Patient Search -->
                    <div class="space-y-2">
                        <label for="patient-search" class="block text-sm font-semibold text-gray-700">
                            Patient <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="flex">
                                <input 
                                    type="text" 
                                    id="patient-search" 
                                    name="patient_search"
                                    placeholder="Search for a patient by name..."
                                    class="flex-1 px-4 py-3 pr-10 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md"
                                    autocomplete="off"
                                >
                                <button 
                                    type="button" 
                                    id="clear-search"
                                    class="px-4 py-3 border border-l-0 border-gray-300 bg-gray-50 rounded-r-lg text-gray-500 hover:bg-gray-100 transition-colors duration-200"
                                    style="display: none;"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            
                            <!-- Patient Dropdown -->
                            <div id="patient-dropdown" class="absolute z-10 w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto hidden">
                                <!-- Patient options will be inserted here by JavaScript -->
                            </div>
                            
                            <!-- Hidden input for patient ID -->
                            <input type="hidden" name="patient_id" id="patient-id" value="">
                        </div>
                    </div>

                    <!-- Dialysis Type -->
                    <div class="space-y-2">
                        <label for="dialysis_type" class="block text-sm font-semibold text-gray-700">
                            Dialysis Type <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="dialysis_type" id="dialysis_type"
                                class="appearance-none w-full px-4 py-3 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                                <option value="hemodialysis">Hemodialysis</option>
                                <option value="peritoneal">Peritoneal</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="space-y-2">
                        <label for="notes" class="block text-sm font-semibold text-gray-700">
                            Notes
                        </label>
                        <textarea name="notes" id="notes" rows="3"
                            placeholder="Add any additional remarks or special instructions..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:shadow-md resize-none"></textarea>
                        <p class="text-xs text-gray-500 mt-1">Optional</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('sessions.index') }}"
                            class="flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-all duration-200 font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Sessions
                        </a>
                        <button type="submit"
                            class="flex-1 sm:flex-none flex items-center justify-center px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Session
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const patientSearch = document.getElementById('patient-search');
            const patientDropdown = document.getElementById('patient-dropdown');
            const patientId = document.getElementById('patient-id');
            const clearSearch = document.getElementById('clear-search');
            
            // Patient data (passed from Laravel)
            const patients = @json($patients);
            
            // Function to render patient dropdown
            function renderPatientDropdown(filteredPatients) {
                patientDropdown.innerHTML = '';
                
                if (filteredPatients.length === 0) {
                    patientDropdown.innerHTML = `
                        <div class="px-4 py-3 text-gray-500 text-sm">
                            No patients found
                        </div>
                    `;
                } else {
                    filteredPatients.forEach(patient => {
                        const option = document.createElement('div');
                        option.className = 'px-4 py-3 hover:bg-blue-50 cursor-pointer transition-colors duration-150 border-b border-gray-100 last:border-b-0';
                        option.innerHTML = `
                            <div class="font-medium text-gray-900">${patient.full_name}</div>
                            <div class="text-sm text-gray-500">${patient.patient_id || 'No ID'} • ${(patient.birthdate)}</div>
                        `;
                        option.addEventListener('click', () => selectPatient(patient));
                        patientDropdown.appendChild(option);
                    });
                }
                
                patientDropdown.classList.remove('hidden');
            }
            
            // Function to select a patient
            function selectPatient(patient) {
                patientSearch.value = patient.full_name;
                patientId.value = patient.id;
                patientDropdown.classList.add('hidden');
                clearSearch.style.display = 'block';
            }
            
            // Clear search
            clearSearch.addEventListener('click', () => {
                patientSearch.value = '';
                patientId.value = '';
                patientDropdown.classList.add('hidden');
                clearSearch.style.display = 'none';
                patientSearch.focus();
            });
            
            // Handle search input
            patientSearch.addEventListener('input', (e) => {
                const query = e.target.value.toLowerCase().trim();
                
                if (query === '') {
                    patientDropdown.classList.add('hidden');
                    clearSearch.style.display = 'none';
                    return;
                }
                
                const filteredPatients = patients.filter(patient => 
                    patient.full_name.toLowerCase().includes(query)
                );
                
                renderPatientDropdown(filteredPatients);
            });
            
            // Handle focus/blur events
            patientSearch.addEventListener('focus', () => {
                if (patientSearch.value.trim() !== '') {
                    const query = patientSearch.value.toLowerCase().trim();
                    const filteredPatients = patients.filter(patient => 
                        patient.full_name.toLowerCase().includes(query)
                    );
                    renderPatientDropdown(filteredPatients);
                }
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!patientSearch.contains(e.target) && !patientDropdown.contains(e.target)) {
                    patientDropdown.classList.add('hidden');
                }
            });
            
            // Prevent form submission if no patient selected
            document.querySelector('form').addEventListener('submit', (e) => {
                if (!patientId.value) {
                    e.preventDefault();
                    patientSearch.focus();
                    patientSearch.classList.add('border-red-500');
                    setTimeout(() => {
                        patientSearch.classList.remove('border-red-500');
                    }, 3000);
                }
            });
        });
    </script>
</x-app-layout>