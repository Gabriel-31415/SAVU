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

            </form>

        </div>
    </div>
	

</x-app-layout>
