<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Email') }}
            </h2>

            <nav class="flex gap-2 text-xs md:text-lg text-white">
                <a class="sub-nav-link" href="{{route('admin.email.index')}}">In Arrivo</a>
                <a class="sub-nav-link" href="{{route('admin.email.trashed')}}">Cestino</a>
            </nav>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 dark:text-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <h3 class="font-semibold text-2xl mb-4">{{ $message->firstName }} {{ $message->lastName }}</h3>
                <div class="text-sm text-slate-500 font-semibold">{{ date('d/m/Y H:i', strtotime($message->created_at)) }}</div>
                <p class="py-6">{{ $message->message }}</p>

                <div class="font-semibold text-sm mb-4">Vorrei essere ricontattato tramite: </div>
                @if ($message->reply == 0)
                    <a class="inline px-4 py-2 bg-slate-600 rounded shodow" href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                @elseif ($message->reply == 1)
                    <div class="inline px-4 py-2 bg-slate-600 rounded shodow">
                        {{ $message->phone }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>