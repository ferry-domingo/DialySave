<x-app-layout>

    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8 flex justify-between">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mx-2">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mx-2">
                <div class="max-w-xs">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mx-2">
                <div class="max-w-xs">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
