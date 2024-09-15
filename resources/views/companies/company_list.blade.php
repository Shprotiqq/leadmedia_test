<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Компании') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3 class="font-medium p-6 text-gray-900">
                    {{ __("Компании") }}
                </h3>
                <hr>
                <a href="{{ route('companies.create') }}">
                    <button class="font-semibold bg-green-500 text-white w-60 h-10 rounded-lg hover:bg-green-700
                    duration-200 shadow-lg transform active:scale-75 transition-all my-6 mx-5">
                        {{ __('Добавить новую компанию') }}
                    </button>
                </a>
                <div class="border border-inherit rounded-md mx-6 ">
                    <h4 class="font-semibold p-6 text-gray-900">Список компаний</h4>
                    <hr>
                    <div class="box-content max-w-6xl">
                        <table class="border-collapse border mx-6 my-6">
                            <thead>
                            <tr>
                                <th scope="col" class="border px-3 py-1">Название</th>
                                <th scope="col" class="border px-6 py-4">Email</th>
                                <th scope="col" class="border px-6 py-4">Url</th>
                                <th scope="col" class="border px-6 py-4"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="border px-1 py-1 font-medium text-gray-900 whitespace-nowrap
                                     dark:text-white text-center">
                                        {{ $company->name }}
                                    </td>
                                    <td class="border px-4 py-2 font-medium text-gray-900 text-center">
                                        {{ $company->email }}
                                    </td>
                                    <td class="border px-6 py-4 font-light text-gray-900 text-wrap">
                                        <a href="{{ $company->url }}">{{ $company->url }}</a>
                                    </td>
                                    <td class="border px-6 py-4 text-right">
                                        <a href="{{ route('companies.show', $company->id) }}">
                                            <button class="font-semibold bg-green-500 text-white w-40 h-10 rounded-lg
                                            hover:bg-green-700 duration-200 shadow-lg transform active:scale-75
                                            transition-all my-2 mx-1">
                                                Show
                                            </button>
                                        </a>
                                        <a href="{{ route('companies.edit', $company->id) }}"
                                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <button class="font-semibold bg-green-500 text-white w-40 h-10 rounded-lg
                                            hover:bg-green-700 duration-200 shadow-lg transform active:scale-75
                                            transition-all my-2 mx-1">
                                                Edit
                                            </button>
                                        </a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="font-semibold bg-red-500 text-white w-40 h-10 rounded-lg
                                                hover:bg-red-700 duration-200 shadow-lg transform active:scale-75
                                                transition-all my-2 mx-1"
                                                onclick="if (!confirm('Вы уверены что хотите удалить компанию?'))
                                                    return false">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $companies->links() }}
                        </table>
                    </divbox-border>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
