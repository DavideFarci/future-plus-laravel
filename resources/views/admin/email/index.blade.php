<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Email') }}
            </h2>

            <nav class="flex gap-2 text-xs md:text-lg text-white">
                <a class="sub-nav-link" href="{{route('admin.email.trashed')}}">Cestino</a>
            </nav>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full table-fixed text-white">
                    <thead>
                      <tr>
                        <th class="p-4 text-left">Mittente</th>
                        <th class="p-4">Messaggio</th>
                        <th class="hidden md:table-cell text-right p-4 pr-8">Data</th>
                        <th class="p-4 text-right">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr class="odd:bg-slate-300 dark:odd:bg-slate-700 hover:opacity-60">
                                <td 
                                    class=" text-sm font-semibold md:hover:cursor-pointer"
                                >
                                    <a class="block h-full p-2" href="{{ route('admin.email.show', $message->id) }}">
                                        {{ $message->name}}
                                    </a>
                                </td>
                                <td 
                                    class="span-2 text-xs block truncate md:hover:cursor-pointere"
                                >
                                    <a class="block h-full p-2" href="{{ route('admin.email.show', $message->id) }}">
                                        {{ $message->message }}
                                    </a>
                                </td>
                                <td 
                                    class="hidden md:table-cell text-right  text-xs md:hover:cursor-pointer"
                                >
                                    <a class="block h-full p-2" href="{{ route('admin.email.show', $message->id) }}">
                                        {{ date('d/m/Y H:i', strtotime($message->created_at)) }}
                                    </a>
                                </td>
                                <td class="p-2 text-sm text-right ">
                                    <form action="{{ route('admin.email.destroy', ['email' => $message]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button  class="hidden md:table-cell text-xs py-1 px-4 border rounded hover:scale-105 hover:transition-all hover:duration-150 hover:bg-slate-600">Elimina</button>
                                        <button class="md:hidden">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                            </svg>
                                        </button>
                                    </form> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>