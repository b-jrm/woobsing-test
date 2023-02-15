<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Two Factor Auth') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('While it is active, a code will be sent to your email whenever you log in') }}
        </p>

        @if(Auth::user()->is_twofactor === 1)
            <p class="mt-1 text-sm text-green-600 dark:text-green-400">
                {{ __('Your Two Factor Auth Is') }} - <b>{{ __('Active') }}</b>
            </p>
        @else
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                {{ __('Your Two Factor Auth Is') }} - <b>{{ __('Inactive') }}</b>
            </p>
        @endif

        

    </header>

    <form method="post" action="{{ route('twofactor.update') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="twofactor" :value="__('Status Two Factor')" />
            <select name="twofactor" id="twofactor" class="mt-1 block w-full">
                @if(Auth::user()->is_twofactor === 1)
                    <option value="0">{{ __('Inactive') }}</option>
                    <option selected value="1">{{ __('Active') }}</option>
                @else
                    <option selected value="0">{{ __('Inactive') }}</option>
                    <option value="1">{{ __('Active') }}</option>
                @endif
            </select>
        </div>

        <div>
            @if (session('status') == 'two-factor-success')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    <!-- {{ __('A new verification link has been sent to the email address you provided during registration.') }} -->
                    {{ __('Your Two Factor has success') }}
                </div>
            @endif
            @if (session('status') == 'two-factor-warning')
                <div class="mb-4 font-medium text-sm text-red-600 dark:text-red-400">
                    <!-- {{ __('A new verification link has been sent to the email address you provided during registration.') }} -->
                    {{ __('Your Two Factor has warning, try again') }}
                </div>
            @endif
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>
        </div>
    </form>
</section>
