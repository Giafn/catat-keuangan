<x-app-layout>
    <div class="p-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6 text-gray-500">
                        <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                    </svg>
                </a>
                <h1 class="text-xl font-bold text-center mb-4">Profile Setting</h1>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="route('logout')"
                        onclick="event.preventDefault();
                                    confirm('Are you sure you want to log out?') ? this.parentElement.submit() : false;"
                        class="block w-full px-4 py-2 text-sm text-center text-white bg-red-500 rounded-md hover:bg-red-600">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
</x-app-layout>
