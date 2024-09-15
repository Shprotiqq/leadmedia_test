<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Сотрудники') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3 class="font-medium p-6 text-gray-900">
                    {{ __("Сотрудники") }}
                </h3>
                <hr>
                <a href="{{ route('employees.create') }}">
                    <button class="font-semibold bg-green-500 text-white w-60 h-10 rounded-lg hover:bg-green-700
                    duration-200 shadow-lg transform active:scale-75 transition-all my-6 mx-5">
                        {{ __('Добавить сотрудника') }}
                    </button>
                </a>
                <div class="border border-inherit rounded-md mx-6 ">
                    <h4 class="font-semibold p-6 text-gray-900">Список сотрудников</h4>
                    <hr>
                    <div class="w-full overflow-x-auto">
                        <table class="border-collapse border w-full">
                            <thead>
                            <tr>
                                <th scope="col" class="border px-3 py-1">Имя</th>
                                <th scope="col" class="border px-3-py-1">Компания</th>
                                <th scope="col" class="border px-3 py-1">Email</th>
                                <th scope="col" class="border px-3 py-1">Телефон</th>
                                <th scope="col" class="border px-2 py-2"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($employees as $employee)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 w-52">
                                    <th scope="row" class="border px-1 py-1 font-medium text-gray-900 whitespace-normal
                                     dark:text-white text-center">
                                        {{ $employee->fullName }}
                                    </th>
                                    <td class="border px-4 py-2 font-medium text-gray-900 whitespace-normal text-center">
                                        {{--                                        {{ $employee->company_id === $companies->id }}--}}
                                    </td>
                                    <td class="border px-1 py-1 font-light text-gray-900 whitespace-normal text-center">
                                        {{ $employee->email }}
                                    </td>
                                    <td class="border px-1 py-1 font-light text-gray-900 whitespace-normal text-center">
                                        {{ $employee->phone_number }}
                                    </td>
                                    <td class="border px-4 py-4 text-right flex flex-col w-auto whitespace-normal
                                    items-center">
                                        <a href="{{ route('employees.show', $employee->id) }}">
                                            <button class="font-semibold bg-green-500 text-white w-40 h-10 rounded-lg
                                            hover:bg-green-700 duration-200 shadow-lg transform active:scale-75
                                            transition-all my-2 mx-1">
                                                Show
                                            </button>
                                        </a>
                                        <a href="{{ route('employees.edit', $employee->id) }}"
                                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <button class="font-semibold bg-green-500 text-white w-40 h-10 rounded-lg
                                            hover:bg-green-700 duration-200 shadow-lg transform active:scale-75
                                            transition-all my-2 mx-1">
                                                Edit
                                            </button>
                                        </a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="font-semibold bg-red-500 text-white w-40 h-10 rounded-lg
                                                hover:bg-red-700 duration-200 shadow-lg transform active:scale-75
                                                transition-all my-2 mx-1"
                                                onclick="if (!confirm('Вы уверены что хотите удалить сотрудника?'))
                                                    return false">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $employees->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
