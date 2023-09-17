<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agendamento Visita') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">

            <div class="grid grid-cols-1 gap-4">
                <!-- component -->
                <x-card titulo="Usuário">
                    
                    <div >
                        <x-input-label>Nome</x-input-label>
                        <x-text-input
                            class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            name="nome" value="{{ $agendamento->user->name }}">
                        </x-text-input>
                    </div>
                    <div >
                        <x-input-label>Telefone</x-input-label>
                        <x-text-input
                            class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            name="nome" value="{{ $agendamento->user->telefone }}">
                        </x-text-input>
                    </div>
                    <div >
                        <x-input-label>Whatsapp</x-input-label>
                        <x-text-input
                            class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            name="nome" value="{{ $agendamento->user->whatsapp }}">
                        </x-text-input>
                    </div>
                    <div >
                        <x-input-label>CPF</x-input-label>
                        <x-text-input
                            class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            name="nome" value="{{ $agendamento->user->cpf }}">
                        </x-text-input>
                    </div>
                </x-card>
                <x-card titulo="Agendamento">
                    <div >
                        <x-input-label>Data</x-input-label>
                        <x-text-input
                            class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            name="descricao" value="{{ date('d/m/Y', strtotime($agendamento->dia->dia)) }}">
                        </x-text-input>
                    </div>
                    <div >
                        <x-input-label>Horário</x-input-label>
                        <x-text-input
                            class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            name="duracao" value="{{ date('H:i', strtotime($agendamento->horario->horario)) }}">
                        </x-text-input>
                    </div>
                </x-card>
                <x-card titulo="Visita">
                    <div >
                        <x-input-label>Tipo de Visita</x-input-label>
                        <x-text-input
                            class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            name="descricao" value="{{ $agendamento->nome }}">
                        </x-text-input>
                    </div>
                    <div >
                        @php
                            if (!$agendamento->visita->tipoVisita) {
                                $descricao = "-";
                            }else {
                                $descricao = $agendamento->visita->tipoVisita->descricao;
                            }
                        @endphp
                        <x-input-label>Descrição</x-input-label>
                        <x-text-input
                            class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            name="duracao" 
                            value="{{  $descricao }}" >
                        </x-text-input>
                    </div>
                    <div >
                        <x-input-label>Status</x-input-label>
                        <x-text-input
                            class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            name="duracao" value="{{ $agendamento->visita->status }}">
                        </x-text-input>
                    </div>
                </x-card>
            </div>

            <br>
            <br>
            {{-- @dd( Auth::user()->tipo ) --}}
            @can('aprovar-visita')
                <x-primary-button>
                    <a href="{{ route('visita.aprovar', ['id' => $agendamento->visita->id]) }}">
                        <span >
                            <i class="fa-solid fa-check"></i>
                            Aprovar
                        </span>
                    </a>    
                </x-primary-button>
                <x-primary-button>
                    <a href="{{ route('visita.reprovar', ['id' => $agendamento->visita->id]) }}">
                        <span >
                            <i class="fa-solid fa-x"></i>
                            Reprovar
                        </span>
                    </a>                         
                </x-primary-button>                
            @endcan
            <x-primary-button  class="bg-green-500">
                <a href="{{ url()->previous() }}">
                    Voltar
                </a>
            </x-primary-button>

        </div>
    </div>
	

</x-app-layout>
