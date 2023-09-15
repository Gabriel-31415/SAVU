<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Visita') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">

            <form action="{{ route('visita.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <x-input-label>Tipo de Visita</x-input-label>
                        <x-select class="mt-2" name='tipo_visita_id'>
                            @foreach ($tipoVisitas as $tipoVisita)
                                <option value="{{ $tipoVisita->id }}">{{ $tipoVisita->nome }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    
                </div>

                <br>
                <br>

                <x-primary-button class="bg-green-500">Selecionar</x-primary-button>

            </form>

        </div>
    </div>
</x-app-layout>
