@extends("layouts.master")

@section('content')

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

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

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                            title="Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial."
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            @error('password')
                @foreach ($errors->get('password') as $error)
                    @if($error === 'The password must be at least 8 characters.')
                        <span class="text-red-500 text-xs italic">{{ $error }} (au moins 8 caractères)</span>
                    @elseif($error === 'The password must contain at least one uppercase letter.')
                        <span class="text-red-500 text-xs italic">{{ $error }} (au moins une majuscule)</span>
                    @elseif($error === 'The password must contain at least one lowercase letter.')
                        <span class="text-red-500 text-xs italic">{{ $error }} (au moins une minuscule)</span>
                    @elseif($error === 'The password must contain at least one number.')
                        <span class="text-red-500 text-xs italic">{{ $error }} (au moins un chiffre)</span>
                    @elseif($error === 'The password must contain at least one special character.')
                        <span class="text-red-500 text-xs italic">{{ $error }} (au moins un caractère spécial)</span>
                    @endif
                @endforeach
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


@endsection
