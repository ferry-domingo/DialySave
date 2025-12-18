<x-app-layout>
    @role('admin')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Dialysis Center Analytics</h1>
                <p class="mt-2 text-gray-600">Comprehensive overview of patient care and treatment metrics</p>
                <div class="mt-4 flex items-center text-sm text-gray-500">
                    <i class="far fa-clock mr-2"></i>
                    Last updated: {{ \Carbon\Carbon::now()->format('F j, Y, g:i A') }}
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Patients Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Patients</p>
                            <p class="mt-1 text-3xl font-bold text-gray-900">{{ $totalpatients }}</p>
                            <div class="flex items-center mt-2 text-sm text-green-600">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>12% from last month</span>
                            </div>
                        </div>
                        <div class="p-3 bg-blue-100 rounded-full">
                            <i class="fas fa-users text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Active Sessions Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Active Sessions</p>
                            <p class="mt-1 text-3xl font-bold text-gray-900">{{ $activeSessions }}</p>
                            <div class="flex items-center mt-2 text-sm text-green-600">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>8% from yesterday</span>
                            </div>
                        </div>
                        <div class="p-3 bg-green-100 rounded-full">
                            <i class="fas fa-notes-medical text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Hemodialysis Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Hemodialysis</p>
                            <p class="mt-1 text-3xl font-bold text-gray-900">{{ $hemodialysisCount }}</p>
                            <div class="flex items-center mt-2 text-sm text-blue-600">
                                <i class="fas fa-equals mr-1"></i>
                                <span>Stable</span>
                            </div>
                        </div>
                        <div class="p-3 bg-blue-100 rounded-full">
                            <i class="fas fa-water text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Peritoneal Dialysis Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Peritoneal Dialysis</p>
                            <p class="mt-1 text-3xl font-bold text-gray-900">{{ $peritonealCount }}</p>
                            <div class="flex items-center mt-2 text-sm text-purple-600">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>5% increase</span>
                            </div>
                        </div>
                        <div class="p-3 bg-purple-100 rounded-full">
                            <i class="fas fa-vial text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Sessions Over Time Chart -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Sessions Over Time</h3>
                        <select id="timeRange" class="text-sm border border-gray-300 rounded px-3 py-1">
                            <option value="7">Last 7 days</option>
                            <option value="30" selected>Last 30 days</option>
                            <option value="90">Last 90 days</option>
                        </select>
                    </div>
                    <div class="h-80">
                        <canvas id="sessionsChart"></canvas>
                    </div>
                </div>

                <!-- Patient Demographics Chart -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Patient Demographics</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Gender Distribution -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Gender Distribution</h4>
                            <div class="h-48">
                                <canvas id="genderChart"></canvas>
                            </div>
                        </div>
                        <!-- Age Distribution -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Age Distribution</h4>
                            <div class="h-48">
                                <canvas id="ageChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Sessions -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Sessions</h3>
                        <a href="{{ route('sessions.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View
                            All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Patient</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Time</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($recentSessions as $session)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-2">
                                                    <i class="fas fa-user text-blue-600 text-xs"></i>
                                                </div>
                                                <span
                                                    class="text-sm font-medium text-gray-900">{{ $session->patient->full_name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($session->created_at)->format('M j, Y') }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($session->created_at)->timezone('Asia/Manila')->format('g:i A') }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $session->dialysis_type === 'hemodialysis' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                                {{ ucfirst($session->dialysis_type) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span
                                              class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $session->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-gray-800' }}">
                                                {{ ucfirst($session->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Upcoming Appointments -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Upcoming Appointments</h3>
                    <div class="space-y-4">
                        @foreach ($upcomingAppointments as $appointment)
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-calendar-check text-blue-600"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">{{ $appointment->patient->full_name }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ \Carbon\Carbon::parse($appointment->date)->format('M j, Y') }}
                                     &middot;
                                    {{ \Carbon\Carbon::parse($appointment->time)->format('g:i A') }}  
                                </p>
                               
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('appointments.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View All Appointments →</a>
                    </div>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Session Success Rate -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-medium text-gray-500">Session Success Rate</h3>
                        <i class="fas fa-chart-line text-green-500"></i>
                    </div>
                    <div class="flex items-baseline">
                        <span class="text-2xl font-bold text-gray-900">{{ $successRate }}%</span>
                        <span class="ml-2 text-sm text-green-600">↑ 2.1%</span>
                    </div>
                    <div class="mt-2 h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-green-500 rounded-full" style="width: 98.5%"></div>
                    </div>
                </div>

                <!-- Average Session Duration -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-medium text-gray-500">Avg. Session Duration</h3>
                        <i class="fas fa-clock text-blue-500"></i>
                    </div>
                    <div class="flex items-baseline">
                        <span class="text-2xl font-bold text-gray-900">{{ $avgHours }}h</span>
                        <span class="ml-2 text-sm text-blue-600">↓ 0.3h</span>
                    </div>
                    <div class="mt-2 h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-500 rounded-full" style="width: 84%"></div>
                    </div>
                </div>

                <!-- Patient Satisfaction -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-medium text-gray-500">Patient Satisfaction</h3>
                        <i class="fas fa-smile text-yellow-500"></i>
                    </div>
                    <div class="flex items-baseline">
                        <span class="text-2xl font-bold text-gray-900">4.8/5</span>
                        <span class="ml-2 text-sm text-yellow-600">↑ 0.2</span>
                    </div>
                    <div class="mt-2 h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-yellow-500 rounded-full" style="width: 94%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     @endrole
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Dashboard JavaScript -->
    <!-- In your dashboard view -->
    <script>
        // Sessions Over Time Chart
        const sessionsCtx = document.getElementById('sessionsChart').getContext('2d');
        const sessionsChart = new Chart(sessionsCtx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Hemodialysis',
                    data: @json($hemodialysisData),
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.3
                }, {
                    label: 'Peritoneal Dialysis',
                    data: @json($peritonealData),
                    borderColor: 'rgb(147, 51, 234)',
                    backgroundColor: 'rgba(147, 51, 234, 0.1)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gender Distribution Chart
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        const genderChart = new Chart(genderCtx, {
            type: 'doughnut',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [{{$malepatients}}, {{$femalepatients}}],
                    backgroundColor: [
                        'rgb(59, 130, 246)',
                        'rgb(236, 72, 153)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Age Distribution Chart
        const ageCtx = document.getElementById('ageChart').getContext('2d');
        const ageChart = new Chart(ageCtx, {
            type: 'bar',
            data: {
                labels: @json(array_keys($ageGroups)),
                datasets: [{
                    label: 'Patients',
                    data: @json(array_values($ageGroups)),
                    backgroundColor: 'rgba(34, 197, 94, 0.8)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Time Range Selector
        document.getElementById('timeRange').addEventListener('change', function (e) {
            const value = e.target.value;
            // In a real application, you would fetch new data based on the selected time range
            console.log('Fetching data for', value, 'days');
            // Update charts with new data
        });

        // Auto-refresh every 5 minutes
        setInterval(() => {
            location.reload();
        }, 300000);
    </script>
   
</x-app-layout>