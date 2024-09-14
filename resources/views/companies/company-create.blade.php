<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавление новой компании') }}
        </h2>
    </x-slot>
    <form action="{{ route('companies.store') }}" enctype="multipart/form-data" method="POST">
        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white rounded-md flex justify-center">

                @csrf

                <label class="block">
                    <label for="name" class="block text-lg font-medium text-slate-700 pt-7">
                        {{ __('Имя компании') }}
                        <input type="text" class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400
                     focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" name="name">
                    </label>
                    <label for="email" class="block text-lg font-medium text-slate-700 pt-7">
                        {{ __('Email компании') }}
                        <input type="text" class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400
                     focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" name="email">
                    </label>
                    <label for="logo_path" class="block text-lg font-medium text-slate-700 pt-7">
                        {{ __('Логотип компании') }}
                        <input type="file" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-500
                    file:text-white hover:file:bg-green-700 pt-5" name="logo_path">
                    </label>
                    <label for="url" class="block text-lg font-medium text-slate-700 pt-7">
                        {{ __('Адрес сайта компании') }}
                        <input type="text" class="mt-1 block w-60 px-3 py-2 bg-white border border-slate-300
                     rounded-md text-sm shadow-sm placeholder-slate-400
                     focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" name="url">
                    </label>
                    <button type="submit" class="font-semibold bg-green-500 text-white w-60 h-10 rounded-lg
                    hover:bg-green-700 duration-200 shadow-lg transform active:scale-75 transition-all my-6 ">
                        {{ __('Добавить компанию') }}
                    </button>
                </label>
            </div>
        </div>
    </form>
</x-app-layout>
