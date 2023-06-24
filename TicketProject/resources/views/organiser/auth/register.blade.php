<x-guest-layout>
    <form method="POST" action="{{ route('organiser.register1') }}">
        @csrf
        Organiser Registration Page
{{--
        <a class="underline text-sm text-dark-1000 dark:text-gray-900 hover:text-gray-1000 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 " style="margin-left: 135px; font-size:15px" href="{{ route('organiser.login') }}">
            {{ __('Login?') }}
        </a> --}}

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

          <!-- mobile number -->
        <div class="mt-4">
            <x-input-label for="number" :value="__('Mobile Number')" />
            <x-text-input id="number" class="block mt-1 w-full" type="number" name="number" :value="old('number')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

          <!--Description -->

        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />

            <textarea id="description" class="block mt-1 w-full" type="description" style="border-radius: 10px; border-color:thistle" name="description" :value="old('description')" required autocomplete="username"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        {{-- <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> --}}

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('organiser.login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Request To Admin!') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
