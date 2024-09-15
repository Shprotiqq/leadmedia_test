<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактирование данных компании') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white rounded-md flex justify-center">
            <label class="block">
                <label for="name" class="block text-lg font-medium text-slate-700 pt-7">
                    {{ __('Имя компании') }}
                    <input type="text" disabled class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500
                     focus:ring-1 focus:ring-sky-500" name="name" value="{{ $company->name }}">
                </label>
                <label for="email" class="block text-lg font-medium text-slate-700 pt-7">
                    {{ __('Email компании') }}
                    <input type="text" disabled class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500
                     focus:ring-1 focus:ring-sky-500" name="email" value="{{ $company->email }}">
                </label>
                <label for="logo_path" class="block text-lg font-medium text-slate-700 pt-7">
                    {{ __('Логотип компании') }}
                    <img src="{{ asset('storage/' . $company->logo_path) }}" class="max-w-60">
                </label>
                <label for="url" class="block text-lg font-medium text-slate-700 pt-7">
                    {{ __('Адрес сайта компании') }}
                    <input type="text" disabled class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500
                     focus:ring-1 focus:ring-sky-500" name="url" value="{{ $company->url }}">
                </label>
                <a href="{{ route('companies.edit', $company->id) }}">
                    <button type="submit" class="font-semibold bg-green-500 text-white w-60 h-10 rounded-lg
                    hover:bg-green-700 duration-200 shadow-lg transform active:scale-75 transition-all my-6 mx-1">
                        {{ __('Редактировать компанию') }}
                    </button>
                </a>
            </label>
        </div>
    </div>
</x-app-layout>

