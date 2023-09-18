<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Solicitações') }}
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
                    {{ __('Solicitações') }}
                </div>
                
            </div>
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Tipo</th>
                            <th class="py-3 px-6 text-left">Descricao</th>
                            <th class="py-3 px-6 text-center">Duração</th>
                            <th class="py-3 px-6 text-center">Aprovação</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($solicitacoes as $solicitacao)

                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $solicitacao->nome }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">

                                        <span>{{ Str::limit($solicitacao->descricao, 30) }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $solicitacao->duracao }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $solicitacao->aprovado }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-gray-900 hover:scale-110">
                                            <a href="{{ route('admin.aprovar', ['id' => $solicitacao->id]) }}">
                                                <span >
                                                    <i class="fa-solid fa-check"></i>
                                                </span>
                                            </a>    
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-gray-900 hover:scale-110">
                                            <a href="{{ route('admin.reprovar', ['id' => $solicitacao->id]) }}">
                                                <span >
                                                    <i class="fa-solid fa-x"></i>
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