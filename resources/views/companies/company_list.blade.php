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
                                @foreach($companies as $company)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $company->name }}
                                        </td>
                                        <td class="border px-6 py-4 font-medium text-gray-900 text-center">
                                            {{ $company->email }}
                                        </td>
                                        <td class="border px-6 py-4 font-medium text-gray-900">
                                            <a href="{{ $company->url }}">{{ $company->url }}</a>
                                        </td>
                                        <td class="border px-6 py-4 text-right">
                                            <a href="{{ route('companies.show', $company->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                                            <a href="{{ route('companies.edit', $company->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $companies->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
