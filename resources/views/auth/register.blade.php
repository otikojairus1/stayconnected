<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
              StayConnected
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="animate__animated animate__backInLeft">
                <x-label for="firstname" :value="__('firstname')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')"  autofocus />
            </div>

            <div class="animate__animated animate__backInRight">
                <x-label for="lastname" :value="__('lastname')" />

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')"  autofocus />
            </div>
{{-- 
            <div class="animate__animated animate__backInLeft">
                <x-label for="bio" :value="__('bio')" />

                <x-input id="bio" class="block mt-1 w-full" type="text" name="bio" :value="old('bio')"  autofocus />
            </div> --}}

            {{-- <div class="animate__animated animate__backInRight">
                <x-label for="gender" :value="__('gender')" />

                <x-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')"  autofocus />
            </div> --}}
{{-- 
            <div class="animate__animated animate__backInLeft">
                <x-label for="currentaddress" :value="__('currentaddress')" />

                <x-input id="currentaddress" class="block mt-1 w-full" type="text" name="currentaddress" :value="old('currentaddress')"  autofocus />
            </div> --}}
{{-- 
            <div class="animate__animated animate__backInRight">
                <x-label for="contactno" :value="__('contactno')" />

                <x-input id="contactno" class="block mt-1 w-full" type="text" name="contactno" :value="old('contactno')"  autofocus />
            </div> --}}

            {{-- <div class="animate__animated animate__backInLeft">
                <x-label for="permanentaddress" :value="__('permanentaddress')" />

                <x-input id="permanentaddress" class="block mt-1 w-full" type="text" name="permanentaddress" :value="old('permanentaddress')"  autofocus />
            </div> --}}

            {{-- <div class="animate__animated animate__backInUp">
                <x-label for="birthday" :value="__('birthday')" />

                <x-input id="birthday" class="block mt-1 w-full" type="text" name="birthday" :value="old('birthday')"  autofocus />
            </div>

             --}}
            <div class="animate__animated animate__backInUp">
               ROLE

                <select class="w-full border bg-white rounded px-3 py-2 outline-none" name="role">
                    <option class="py-1">Owner</option>
                    <option class="py-1">Student</option>
                    <option class="py-1">CompanyRepresentative</option>
                </select>
            </div>

  

            <!-- Email Address -->
            <div class="mt-4 ">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                 autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"  />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
