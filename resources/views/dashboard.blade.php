<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-center">
                @can('ver-minha-visita')
                    <div class=" w-1/2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <a href="{{route('visita.minhasVisitas')}}">
                            <div class=" border flex grid grid-cols-5 rounded-lg shadow-lg shadow-emerald-200 border-white border-t-2 border-l-2 hover:rounded-lg">
                                    {{-- <div class="translate-y-4 pl-8"> <Image alt="instagram logo" width="30" height="30" src="https://sahilnetic.xyz/twitter.png" /></div> --}}
                                <h3 class="text-center text-white py-5 col-end-4 pl-2">Minhas Visitas</h3>
                            </div>
                        </a>
                    </div>
                @endcan
                @can('ver-visita')
                    <div class=" w-1/2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <a href="{{ route('visita.index') }}">
                            <div class=" border flex grid grid-cols-5 rounded-lg shadow-lg shadow-emerald-200 border-white border-t-2 border-l-2 hover:rounded-lg">
                                    {{-- <div class="translate-y-4 pl-8"> <Image alt="instagram logo" width="30" height="30" src="https://sahilnetic.xyz/twitter.png" /></div> --}}
                                <h3 class="text-center text-white py-5 col-end-4 pl-2">Visitas</h3>
                            </div>
                        </a>
                    </div>
                @endcan
                @can('ver-tipo-visita')
                    <div class=" w-1/2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <a href="{{ route('tipoVisita.index') }}">
                            <div class=" border flex grid grid-cols-5 rounded-lg shadow-lg shadow-emerald-200 border-white border-t-2 border-l-2 hover:rounded-lg">
                                    {{-- <div class="translate-y-4 pl-8"> <Image alt="instagram logo" width="30" height="30" src="https://sahilnetic.xyz/twitter.png" /></div> --}}
                                <h3 class="text-center text-white py-5 col-end-4 pl-2">Tipo de Visitas</h3>
                            </div>
                        </a>
                    </div>
                @endcan
                @can('ver-solicitacao')
                    <div class=" w-1/2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <a href="{{ route('admin.solicitacoes') }}">
                            <div class=" border flex grid grid-cols-5 rounded-lg shadow-lg shadow-emerald-200 border-white border-t-2 border-l-2 hover:rounded-lg">
                                    {{-- <div class="translate-y-4 pl-8"> <Image alt="instagram logo" width="30" height="30" src="https://sahilnetic.xyz/twitter.png" /></div> --}}
                                <h3 class="text-center text-white py-5 col-end-4 pl-2">Solicitações</h3>
                            </div>
                        </a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
