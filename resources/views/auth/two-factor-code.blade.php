<x-guest-layout>

    <div>
        @if (session('status') == 'two-factor-code-success')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('Your Code Two Factor has success') }} - <a href="{{ route('dashboard') }}" class="underline">{{ __('Dashboard') }}</a>
            </div>
        @endif
        @if (session('status') == 'two-factor-code-warning')
            <div class="mb-4 font-medium text-sm text-red-600 dark:text-red-400">
                {{ __('Your Code Two Factor has warning, try again') }}
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('view_twofactor.compare') }}">
        @csrf

        <!-- Confirm Code -->
        <div class="mt-4">
            <x-input-label for="code_twofactor" :value="__('Code Two Factor')" />
            <x-text-input id="code_twofactor" class="block mt-1 w-full" type="text" name="code_twofactor" required autocomplete="code_twofactor" />
            <x-input-error :messages="$errors->get('code_twofactor')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm Code') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
