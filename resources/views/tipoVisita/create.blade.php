<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tipo de Visita') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">

            <form action="{{ route('tipoVisita.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div >
                        <x-input-label>Nome</x-input-label>
                        <x-text-input
							class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
							name="nome">
                        </x-text-input>
                    </div>
                    <div >
                        <x-input-label>Descriçao</x-input-label>
                        <x-text-input
							class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
							name="descricao">
                        </x-text-input>
                    </div>
                    <div >
                        <x-input-label>Duração</x-input-label>
                        <x-text-input
							class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
							name="duracao">
                        </x-text-input>
                    </div>
                    <div class="flex flex-row" >
                        <div class="basis-1/6 pr-4">
                            <x-input-label>De</x-input-label>
                            <x-text-input
                                type="time"
                                class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                                name="manha_inicio">
                            </x-text-input>
                        </div>
                        <div class="basis-1/6">
                            <x-input-label>às</x-input-label>
                            <x-text-input
                                type="time"
                                class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                                name="manha_fim">
                            </x-text-input>
                        </div>
                    </div>

                    <div class="flex flex-row" >
                        <div class="basis-1/6 pr-4">
                            <x-input-label>De</x-input-label>
                            <x-text-input
                                type="time"
                                class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                                name="tarde_inicio">
                            </x-text-input>
                        </div>
                        <div class="basis-1/6">
                            <x-input-label>às</x-input-label>
                            <x-text-input
                                type="time"
                                class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                                name="tarde_fim">
                            </x-text-input>
                        </div>
                    </div>

                    <div >
                        <x-input-label>Dias da Semana</x-input-label>
                        <input type="checkbox" name="funciona_segunda" id="checkbox-1">
                        <x-input-label-span>Segunda</x-input-label-span>
                        <br>
                        <input type="checkbox" name="funciona_terca" id="checkbox-2">
                        <x-input-label-span>Terça</x-input-label-span>
                        <br>
                        <input type="checkbox" name="funciona_quarta" id="checkbox-3">
                        <x-input-label-span>Quarta</x-input-label-span>
                        <br>
                        <input type="checkbox" name="funciona_quinta" id="checkbox-4">
                        <x-input-label-span>Quinta</x-input-label-span>
                        <br>
                        <input type="checkbox" name="funciona_sexta" id="checkbox-5">
                        <x-input-label-span>Sexta</x-input-label-span>
                        <br>
                        <input type="checkbox" name="funciona_sabado" id="checkbox-6">
                        <x-input-label-span>Sábado</x-input-label-span>
                        <br>
                        <input type="checkbox" name="funciona_domingo" id="checkbox-7">
                        <x-input-label-span>Domingo</x-input-label-span>

                    </div>
                   
                    <div >
                        <x-input-label>image</x-input-label>
                        <input
							type="file"
							class="w-full mt-2 mb-6 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
							name="images[]" multiple>
                    </div>
                  </div>

                <br>
                <br>

                <x-primary-button class="bg-green-500"> Salvar</x-primary-button>
                <x-secondary-button  class="bg-green-500">
                    <a href="{{ url()->previous() }}">
                        Voltar
                    </a>
                </x-secondary-button>
            </form>

        </div>
    </div>
	

</x-app-layout>
