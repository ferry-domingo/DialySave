<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <!-- Para sa desktop: magiging side-by-side pa rin -->
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Profile Information Form -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full lg:w-2/3">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Password Form -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full lg:w-1/3">
                    <div class="max-w-xs">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete User Form -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full lg:w-1/3">
                    <div class="max-w-xs">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>