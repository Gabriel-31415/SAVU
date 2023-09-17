<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Visita') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="p-2 mb-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{ route('visita.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <x-input-label>Tipo de Visita</x-input-label>
                        <x-select class="mt-2" name='tipo_visita_id' >
                            @foreach ($tipoVisitas as $tipo)
                                @if ( $tipo->id == $tipoVisita->id )
                                    <option selected value="{{ $tipoVisita->id }}">{{ $tipoVisita->nome }}</option>
                                @endif
                            @endforeach
                        </x-select>
                    </div>

                    @php
                    $weekMap = [
                                0 => 'domingo',
                                1 => 'segunda',
                                2 => 'terca',
                                3 => 'quarta',
                                4 => 'quinta',
                                5 => 'sexta',
                                6 => 'sabado',
                            ];
                        $period = \Carbon\CarbonPeriod::create(now(), now()->addDays(15));
                        $dates = [];
                        foreach ($period as $date) {
                            if(!($tipoVisita->funciona_domingo) && $date->isSunday()) {continue;}
                            if(!($tipoVisita->funciona_segunda) && $date->isMonday()) {continue;}
                            if(!($tipoVisita->funciona_terca) && $date->isTuesday()) {continue;}
                            if(!($tipoVisita->funciona_quarta) && $date->isWednesday()) {continue;}
                            if(!($tipoVisita->funciona_quinta) && $date->isThursday()) {continue;}
                            if(!($tipoVisita->funciona_sexta) && $date->isFriday()) {continue;}
                            if(!($tipoVisita->funciona_sabado) && $date->isSaturday()) {continue;}
                            array_push( $dates, $date );
                        }
                    @endphp
                    <div>
                        <x-input-label>Data</x-input-label>
                        <x-select class="mt-2" name='dia'> 
                            @foreach ($dates as $date)
                                <option value="{{ $date->format('d/m/Y') }}">{{ $date->format('d/m/Y') }}</option>
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
                        <x-input-label>Horario da manhã( {{ ' De ' . date('H:i', strtotime($tipoVisita->manha_inicio)) . ' às ' . date('H:i', strtotime($tipoVisita->manha_fim)) . ' '  }} ):</x-input-label>
                        <input id="horario_manha" type="time" name="horario_manha" min="{{ date('H:i', strtotime($tipoVisita->manha_inicio)) }}" max="{{ date('H:i', strtotime($tipoVisita->manha_fim)) }}">
                        <span class="validity"></span>
                        {{-- <x-select class="mt-2" name='horario'>
                            @foreach ($horarios as $horario)
                                <option value="{{ $horario->id }}">{{ date('H:i', strtotime($horario->horario)) }}</option>
                            @endforeach
                        </x-select> --}}
                    </div>
                    <div>
                        <x-input-label>Horario da tarde( {{ ' De ' . date('H:i', strtotime($tipoVisita->tarde_inicio)) . ' às ' . date('H:i', strtotime($tipoVisita->tarde_fim)) . ' '  }} ):</x-input-label>
                        <input id="horario_tarde" type="time" name="horario_tarde" min="12:00" max="18:00">
                        {{-- <x-select class="mt-2" name='horario'>
                            @foreach ($horarios as $horario)
                                <option value="{{ $horario->id }}">{{ date('H:i', strtotime($horario->horario)) }}</option>
                            @endforeach
                        </x-select> --}}
                    </div>
                </div>

                <br>
                <br>

                <x-primary-button class="bg-green-500">Agendar Visita</x-primary-button>

            </form>

        </div>
    </div>
    <script>
        document.getElementById("horario_manha").addEventListener("click", () => {
                // document.getElementById("horario_manha").disabled = false;
                // document.getElementById("horario_tarde").disabled = true;
                document.getElementById("horario_tarde").value = '--:--';
        } );
        document.getElementById("horario_tarde").addEventListener("click", () => {
                // document.getElementById("horario_tarde").disabled = false;
                // document.getElementById("horario_manha").disabled = true;
                document.getElementById("horario_manha").value = '--:--';
          } );
    </script>

</x-app-layout>
