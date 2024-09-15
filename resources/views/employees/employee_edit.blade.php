<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактирование данных сотрудника') }}
        </h2>
    </x-slot>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white rounded-md flex justify-center">

                @csrf
                @method('PUT')

                <label class="block">
                    <label for="first_name" class="block text-lg font-medium text-slate-700 pt-7">
                        {{ __('Имя сотрудника') }}
                        <input type="text" class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400
                     focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" name="first_name" value="{{ $employee->first_name }}">
                    </label>
                    <label for="last_name" class="block text-lg font-medium text-slate-700 pt-7">
                        {{ __('Фамилия сотрудника') }}
                        <input type="text" class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400
                     focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" name="last_name" value="{{ $employee->last_name }}">
                    </label>
                    <label for="email" class="block text-lg font-medium text-slate-700 pt-7">
                        {{ __('Email сотрудника') }}
                        <input type="email" class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400
                     focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" name="email" value="{{ $employee->email }}">
                    </label>
                    <label for="phone_number" class="block text-lg font-medium text-slate-700 pt-7">
                        {{ __('Номер телефона сотрудника') }}
                        <input type="tel" class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400
                     focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" name="phone_number" value="{{ $employee->phone_number }}">
                    </label>
                    <label for="company_id" class="block text-lg font-medium text-slate-700 pt-7">
                        {{ __('Компания') }}
                        <input type="text" class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400
                     focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" name="company_id" value="{{ $employee->company_id }}">
                    </label>
                    <button type="submit" class="font-semibold bg-green-500 text-white w-60 h-10 rounded-lg
                    hover:bg-green-700 duration-200 shadow-lg transform active:scale-75 transition-all my-6 ">
                        {{ __('Подтвердить редактирование') }}
                    </button>
                </label>
            </div>
        </div>
    </form>
</x-app-layout>

