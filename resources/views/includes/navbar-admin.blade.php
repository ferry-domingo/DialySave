<nav class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-blue-900 to-indigo-900 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Enhanced Logo and Brand -->
            <div class="flex items-center group">
                <!-- Logo Container with Glow Effect -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex-shrink-0 flex items-center transition-all duration-300 hover:scale-105">
                    <!-- Logo with Shadow and Border -->
                    <div class="relative">
                        <img class="h-10 w-auto rounded-lg shadow-lg border-2 border-white/20 transition-all duration-300 group-hover:shadow-xl group-hover:border-white/40"
                            src="/images/logo.png" alt="DialySave Logo"
                            onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAiIGhlaWdodD0iMTAiIHZpZXdCb3g9IjAgMCAxMCAxMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMTAiIGN5PSIxMCIgcj0iMTAiIGZpbGw9IiNmMGYwZjAiLz4KPHBhdGggZD0iTTIwLjUgMTYuNkwyMC41IDE2LjZMMjAuNSAxNi42WiIgZmlsbD0iIzY2NjY2NiIvPgo8L3N2Zz4='">
                        <!-- Glow Effect Overlay -->
                        <div
                            class="absolute inset-0 bg-white/10 rounded-lg blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <!-- Brand Name with Enhanced Styling -->
                    <span
                        class="ml-3 text-xl font-bold tracking-wide text-white drop-shadow-lg transition-all duration-300 group-hover:text-blue-200">
                        DialySave
                        <span class="block text-xs font-normal text-blue-200 mt-1 opacity-70 group-hover:opacity-100">
                            Operated by: First Renal Dialysis Center Corp.
                        </span>
                    </span>
                </a>
            </div>
            
            <!-- Desktop Navigation Links -->
            <div class="hidden md:block">
                @role('admin')
                    <div class="ml-10 flex items-baseline space-x-2">
                        <a href="{{route('admin.dashboard')}}"
                            class="px-4 py-2 rounded-md text-sm font-medium text-white {{ request()->is('dashboard*') ? 'bg-white bg-opacity-20 hover:bg-opacity-30' : 'hover:bg-white hover:bg-opacity-20' }} transition duration-300 flex items-center transform hover:scale-105">
                            <i class="fas fa-chart-bar mr-2"></i> Dashboard
                        </a>
                        <a href="{{route('patients.index')}}"
                            class="px-4 py-2 rounded-md text-sm font-medium text-white {{ request()->is('patients*') ? 'bg-white bg-opacity-20 hover:bg-opacity-30' : 'hover:bg-white hover:bg-opacity-20' }} transition duration-300 flex items-center transform hover:scale-105">
                            <i class="fas fa-users mr-2"></i> Patients
                        </a>
                        <a href="{{route('users.index')}}"
                            class="px-4 py-2 rounded-md text-sm font-medium text-white {{ request()->is('users*') ? 'bg-white bg-opacity-20 hover:bg-opacity-30' : 'hover:bg-white hover:bg-opacity-20' }} transition duration-300 flex items-center transform hover:scale-105">
                            <i class="fas fa-users mr-2"></i> Accounts
                        </a>
                        <a href="{{route('sessions.index')}}"
                            class="px-4 py-2 rounded-md text-sm font-medium text-white {{ request()->is('sessions*') ? 'bg-white bg-opacity-20 hover:bg-opacity-30' : 'hover:bg-white hover:bg-opacity-20' }} transition duration-300 flex items-center transform hover:scale-105">
                            <i class="fas fa-calendar-check mr-2"></i> Sessions
                        </a>
                        <a href="{{route('appointments.index')}}"
                            class="px-4 py-2 rounded-md text-sm font-medium text-white {{ request()->is('appointments*') ? 'bg-white bg-opacity-20 hover:bg-opacity-30' : 'hover:bg-white hover:bg-opacity-20' }} transition duration-300 flex items-center transform hover:scale-105">
                            <i class="fas fa-calendar mr-2"></i> Appointments
                        </a>
                    </div>
                @elserole('patient')
                    <div class="ml-10 flex items-baseline space-x-2">
                        <a href="{{route('patient.dashboard')}}"
                            class="px-4 py-2 rounded-md text-sm font-medium text-white {{ request()->is('dashboard*') ? 'bg-white bg-opacity-20 hover:bg-opacity-30' : 'hover:bg-white hover:bg-opacity-20' }} transition duration-300 flex items-center transform hover:scale-105">
                            <i class="fas fa-chart-bar mr-2"></i> Dashboard
                        </a>
                        <a href="{{route('patient-session.index')}}"
                            class="px-4 py-2 rounded-md text-sm font-medium text-white {{ request()->is('sessions*') ? 'bg-white bg-opacity-20 hover:bg-opacity-30' : 'hover:bg-white hover:bg-opacity-20' }} transition duration-300 flex items-center transform hover:scale-105">
                            <i class="fas fa-calendar-check mr-2"></i> Sessions
                        </a>
                        <a href="{{route('patient-appointment.index')}}"
                            class="px-4 py-2 rounded-md text-sm font-medium text-white {{ request()->is('appointments*') ? 'bg-white bg-opacity-20 hover:bg-opacity-30' : 'hover:bg-white hover:bg-opacity-20' }} transition duration-300 flex items-center transform hover:scale-105">
                            <i class="fas fa-calendar mr-2"></i> Appointments
                        </a>
                    </div>
                @endif
            </div>

            <!-- User Menu -->
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <x-dropdown align="right" width="64">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition duration-300 transform hover:scale-105">
                                <div
                                    class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-900 to-indigo-900 flex items-center justify-center shadow-lg">
                                    <span
                                        class="text-white font-bold text-lg">{{Auth::user()->name ? Auth::user()->name[0] : 'U'}}</span>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div
                                class="origin-top-right absolute right-0 mt-2 w-64 rounded-lg shadow-xl py-3 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none border-l-4 border-red-500">
                                <div class="px-4 py-3 border-b border-gray-200">
                                    <p class="text-base font-bold text-gray-900">{{Auth::user()->name}}</p>
                                    <p class="text-sm text-gray-600">{{Auth::user()->email}}</p>
                                    <div class="mt-2 flex items-center">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <i class="fas fa-user-md mr-1"></i>
                                            {{ucfirst(Auth::user()->role ?? 'User')}}
                                        </span>
                                    </div>
                                </div>
                                <div class="py-1">
                                    <x-dropdown-link :href="route('profile.edit')"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user-circle mr-3 text-red-500"></i> Profile Settings
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-3 text-green-500"></i> Logout
                                    </x-dropdown-link>
                                </div>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" id="mobile-menu-button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-white hover:bg-opacity-20 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white transition duration-300"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" id="menu-open-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6 hidden" id="menu-close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-gradient-to-r from-blue-900 to-indigo-900 border-t border-white/10">
            @role('admin')
                <a href="{{route('admin.dashboard')}}"
                    class="text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->is('dashboard*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10' }} transition duration-200">
                    <i class="fas fa-chart-bar mr-2"></i> Dashboard
                </a>
                <a href="{{route('patients.index')}}"
                    class="text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->is('patients*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10' }} transition duration-200">
                    <i class="fas fa-users mr-2"></i> Patients
                </a>
                <a href="{{route('users.index')}}"
                    class="text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->is('users*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10' }} transition duration-200">
                    <i class="fas fa-users mr-2"></i> Accounts
                </a>
                <a href="{{route('sessions.index')}}"
                    class="text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->is('sessions*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10' }} transition duration-200">
                    <i class="fas fa-calendar-check mr-2"></i> Sessions
                </a>
                <a href="{{route('appointments.index')}}"
                    class="text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->is('appointments*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10' }} transition duration-200">
                    <i class="fas fa-calendar mr-2"></i> Appointments
                </a>
            @elserole('patient')
                <a href="{{route('patient.dashboard')}}"
                    class="text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->is('dashboard*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10' }} transition duration-200">
                    <i class="fas fa-chart-bar mr-2"></i> Dashboard
                </a>
                <a href="{{route('patient-session.index')}}"
                    class="text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->is('sessions*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10' }} transition duration-200">
                    <i class="fas fa-calendar-check mr-2"></i> Sessions
                </a>
                <a href="{{route('patient-appointment.index')}}"
                    class="text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->is('appointments*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10' }} transition duration-200">
                    <i class="fas fa-calendar mr-2"></i> Appointments
                </a>
            @endif
            
            <div class="pt-2 border-t border-white/10">
                <div class="px-3 py-2">
                    <p class="text-xs text-blue-200 mb-1">Logged in as:</p>
                    <p class="text-white font-medium">{{Auth::user()->name}}</p>
                    <p class="text-xs text-blue-200">{{ucfirst(Auth::user()->role ?? 'User')}}</p>
                </div>
            </div>
            
            <a href="{{ route('profile.edit') }}"
                class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10 transition duration-200">
                <i class="fas fa-user-circle mr-2"></i> Profile Settings
            </a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();"
                class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10 transition duration-200">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
            <form id="mobile-logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</nav>

<!-- Main Content with Top Padding -->
<main class="pt-16">
    <!-- Your existing content goes here -->
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');
        
        mobileMenuButton.addEventListener('click', function() {
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
            
            // Toggle menu visibility
            mobileMenu.classList.toggle('hidden');
            
            // Toggle icon visibility
            menuOpenIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('hidden');
            
            // Update aria-expanded
            mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
            
            // Prevent body scroll when menu is open
            if (!isExpanded) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuOpenIcon.classList.remove('hidden');
                    menuCloseIcon.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                    document.body.style.overflow = '';
                }
            }
        });
        
        // Close menu when pressing Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        });
    });
</script>