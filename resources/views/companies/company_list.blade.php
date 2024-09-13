<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Компании') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3 class="p-6 text-gray-900">
                    {{ __("Список компаний") }}
                </h3>
                <hr>
                <a href="{{ route('companies.create') }}">
                    <button class="font-semibold bg-green-500 text-white w-60 h-10 rounded-lg hover:bg-green-700
                    duration-200 shadow-lg transform active:scale-75 transition-all my-6 mx-5">
                        {{ __('Добавить новую компанию') }}
                    </button>
                </a>
                <div class="border border-inherit rounded-md mx-6 ">
                    <h4>Список компаний</h4>
                    <hr>
                    <div>
                        <table class="table-fixed border-collapse border">
                            <thead>
                            <tr>
                                <th class="border">Название</th>
                                <th class="border">Email</th>
                                <th class="border">Url</th>
                                <th class="border"></th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
