<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sesion') }}
        </h2> 
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Estas aqui, porque tu última sessión fue abierta el ") }}{{ date('Y-m-d H:i:s', strtotime(Auth::user()->last_auth)) }}, y ha superado las 24 horas sin abrir tu cuenta
                    <br>
                    <a href="{{ route('welcome') }}" class="underline text-blue-300">-----> Ir al Inicio</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>