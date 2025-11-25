<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex flex-col items-center">
            <p>Welcome Back</p>
            <p class="text-gray-500">Sign in to access your account</p>

        </div>

        <div>
            <x-input-label for="role" :value="__('I am a')" />
            <div x-data="{ open: false, selected: 'Select your role' }" class="relative">
                <button @click="open = !open" class="w-full px-4 py-2 border rounded-md">
                    <i class="fas fa-user-tag mr-2"></i> <span x-text="selected"></span>
                </button>

                <ul x-show="open" class="absolute z-10 bg-white border rounded-md mt-1 w-full">
                    <li @click="selected = 'admin'; open = false" class="px-4 py-2 hover:bg-gray-100">
                        <i class="fas fa-lock mr-2"></i> Admin
                    </li>
                    <li @click="selected = 'doctor'; open = false" class="px-4 py-2 hover:bg-gray-100">
                        <i class="fas fa-user-doctor mr-2"></i> Doctor
                    </li>
                    <li @click="selected = 'staff'; open = false" class="px-4 py-2 hover:bg-gray-100">
                        <i class="fas fa-user-tie mr-2"></i> Staff
                    </li>
                     <li @click="selected = 'patient'; open = false" class="px-4 py-2 hover:bg-gray-100">
                        <i class="fas fa-hospital-user mr-2"></i> Patient
                    </li>
                </ul>
                   <input type="hidden" name="role" :value="selected !== 'Select your role' ? selected : ''">
            </div>
         
        <!-- Email Address -->
        <div class="relative">
            <x-input-label for="email" :value="__('Email')" />

            <i class="fas fa-envelope absolute left-3 top-9 text-gray-500"></i>
            <x-text-input id="email" class="pl-10 block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="email" placeholder="Enter your email" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />
            <i class="fas fa-lock absolute left-3 top-9 text-gray-500"></i>
             <x-text-input id="password" class="pl-10 block mt-1 w-full" type="password" name="password" :value="old('password')"
                required autofocus autocomplete="password" placeholder="Enter your password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded bg-white border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-300  "
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600  hover:text-blue-700  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>