<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Visita') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">

            <form action="{{ route('visita.store') }}" method="post" enctype="multipart/form-data">
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
                    <div>
                        <x-input-label>Data</x-input-label>
                        <x-select class="mt-2" name='dia'>
                            @foreach ($dias as $dia)
                                <option value="{{ $dia->id }}">{{ date('d/m/Y', strtotime($dia->dia)) }}</option>
                            @endforeach
                        </x-select>
                        {{-- Componente datapicker --}}
                        {{-- <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Selecione uma data">
                        </div> --}}

                    </div>
                    <div>
                        <x-input-label>Horario</x-input-label>
                        <x-select class="mt-2" name='horario'>
                            @foreach ($horarios as $horario)
                                <option value="{{ $horario->id }}">{{ date('H:i', strtotime($horario->horario)) }}</option>
                            @endforeach
                        </x-select>
                    </div>
                </div>

                <br>
                <br>

                <x-primary-button class="bg-green-500">Agendar Visita</x-primary-button>

            </form>

        </div>
    </div>


</x-app-layout>
