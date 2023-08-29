<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Visita') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-green-200 relative text-green-600 p-3 rounded-lg mb-4">
                    {{ session('message') }}
                </div>
            @endif
            <div class="bg-white grid grid-cols-6 gap-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 col-start-1 col-end-3 text-gray-900 dark:text-gray-100 mt-2">
                    {{ __('Visita') }}
                </div>
                <div class="p-6 col-end-8 col-span-1">
                    @if (request()->routeIs('visita.minhasVisitas'))
                        <x-nav-link :href="route('visita.create')" >
                            <x-primary-button>Adicionar</x-primary-button>
                        </x-nav-link>                        
                    @endif
                </div>
            </div>
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Tipo</th>
                            <th class="py-3 px-6 text-left">Data</th>
                            <th class="py-3 px-6 text-center">Horário</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($agendamentos as $agendamento)

                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $agendamento->visita->tipoVisita->nome }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">

                                        <span>{{ date('d/m/Y', strtotime($agendamento->dia->dia)) }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{ date('H:i', strtotime($agendamento->horario->horario)) }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">
                                        {{ $agendamento->visita->status }}
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-gray-900 hover:scale-110">
                                            <a href="{{ route('visita.show', ['id' => $agendamento->visita->id]) }}">
                                                <span >
                                                    <i class="fa-solid fa-eye"></i>
                                                </span>
                                            </a>    
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-gray-900 hover:scale-110">
                                            <a href="{{ route('visita.edit', ['id' => $agendamento->id]) }}">
                                                <span >
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </span>
                                            </a>                         
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-gray-900 hover:scale-110">
                                            <a href="{{ route('visita.delete', ['id' => $agendamento->id]) }}">
                                                <span >
                                                    <i class="fa-solid fa-trash"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>