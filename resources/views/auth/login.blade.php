<x-guest-layout>

    
        
        <!-- Header -->
        <div class="text-center mb-4 flex flex-col items-center space-y-4">
            <x-application-logo class="h-16 w-16 sm:h-20 sm:w-20"></x-application-logo>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Welcome Back</h1>
            <p class="text-gray-600 text-sm sm:text-base">Sign in to access your account</p>
        </div>
        <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto w-full space-y-6 px-4 sm:px-6 shadow-xl py-4">
        @csrf
        <!-- Email Input -->
        <div class="space-y-2">
            <x-auth-session-status class="mb-6" :status="session('status')" />
            <x-input-label for="login" :value="__('Login')" class="block text-sm font-medium text-gray-700" />
            
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400 text-sm sm:text-base"></i>
                </div>
                <x-text-input 
                    id="login" 
                    type="login" 
                    name="login" 
                    :value="old('login')"
                    required 
                    autocomplete="login"
                    placeholder="Email or Patient ID"
                    class="block w-full pl-10 pr-3 py-2.5 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm sm:text-base"
                />
            </div>
            
            <x-input-error :messages="$errors->get('login')" class="mt-1 text-sm text-red-600" />
        </div>

        <!-- Password Input -->
        <div class="space-y-2">
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
            
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400 text-sm sm:text-base"></i>
                </div>
                <x-text-input 
                    id="password" 
                    type="password" 
                    name="password" 
                    :value="old('password')"
                    required 
                    autocomplete="current-password"
                    placeholder="••••••••"
                    class="block w-full pl-10 pr-3 py-2.5 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm sm:text-base"
                />
            </div>
            
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex flex-col sm:flex-row items-center justify-between space-y-3 sm:space-y-0">
            <div class="flex items-center">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    name="remember"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                >
                <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                    {{ __('Remember me') }}
                </label>
            </div>

            @if (Route::has('password.request'))
                <a 
                    href="{{ route('password.request') }}" 
                    class="text-sm text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline"
                >
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <x-primary-button 
                class="w-full flex justify-center py-2.5 sm:py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                {{ __('Log in') }}
            </x-primary-button>
             
        </div>
    </form>
</x-guest-layout>