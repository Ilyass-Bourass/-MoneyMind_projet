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
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Salaire Mensuel -->
        <div class="mt-4">
            <x-input-label for="salaire_mensuel" :value="__('Salaire Mensuel')" />
            <x-text-input id="salaire_mensuel" 
                          class="block mt-1 w-full" 
                          type="number" 
                          step="0.01"
                          name="salaire_mensuel" 
                          :value="old('salaire_mensuel')" 
                          required />
            <x-input-error :messages="$errors->get('salaire_mensuel')" class="mt-2" />
        </div>

        <!-- Objectif Mensuel -->
        <div class="mt-4">
            <x-input-label for="objectif_mensuel" :value="__('Objectif Mensuel')" />
            <x-text-input id="objectif_mensuel" 
                          class="block mt-1 w-full" 
                          type="number"  
                          step="0.01"
                          name="objectif_mensuel" 
                          :value="old('objectif_mensuel')" 
                          required />
            <x-input-error :messages="$errors->get('objectif_mensuel')" class="mt-2" />
        </div>
        

        <!-- Date de Crédit -->
        <div class="mt-4">
            <x-input-label for="date_credit" :value="__('Date de Crédit (1-31)')" />
            <x-text-input id="date_credit" 
                          class="block mt-1 w-full" 
                          type="number" 
                          min="1" 
                          max="31"
                          name="date_credit" 
                          :value="old('date_credit')" 
                          required />
            <x-input-error :messages="$errors->get('date_credit')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
