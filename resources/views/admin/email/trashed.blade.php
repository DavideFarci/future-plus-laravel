<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Email') }}
            </h2>

            <nav class="flex gap-2 text-xs md:text-lg text-white">
                <a class="sub-nav-link" href="{{route('admin.email.index')}}">In Arrivo</a>
            </nav>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="font-semibold text-xl text-gray-800 mb-3 ml-1 dark:text-gray-200 leading-tight">
                Cestino
            </h3>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full table-fixed dark:text-white">
                    <thead>
                      <tr>
                        <th class="p-4 text-left">Mittente</th>
                        <th class="p-4">Messaggio</th>
                        <th class="hidden md:table-cell text-right p-4 pr-8">Data</th>
                        <th class="p-4 text-right">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($trashedMessages as $message)
                            <tr 
                                x-data="{ open{{$message->id}} : false}" 
                                class="odd:bg-slate-300 dark:odd:bg-slate-700 md:hover:opacity-60"
                            >
                                <td 
                                    class="p-2 text-sm font-semibold "
                                >
                                    {{ $message->name }}
                                </td>
                                <td 
                                    class="p-2 text-xs block truncate"
                                >
                                        {{ $message->message }}
                                </td>
                                <td 
                                    class="hidden md:table-cell text-right p-2 text-xs "
                                >
                                    {{ date('d/m/Y H:i', strtotime($message->created_at)) }}
                                </td>
                                <td class="p-2 text-sm text-right ">
                                    <button 
                                        class="hidden md:table-cell text-xs py-1 px-4 border rounded hover:scale-105 hover:transition-all hover:duration-150 hover:bg-slate-600"
                                        x-on:click="open{{$message->id}} = ! open{{$message->id}}"
                                    >
                                        Elimina
                                    </button>
                                    <button x-on:click="open{{$message->id}} = ! open{{$message->id}}" class="md:hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                        </svg>
                                    </button>
                                    <div x-show="open{{$message->id}}" class="fixed inset-0 flex justify-center items-center px-2 hover:opacity-100">
                                        <div role="alert" x-on:click.outside="open{{$message->id}} = ! open{{$message->id}}"
                                            >
                                            <div class=" bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                                Cancellare definitivamente?
                                            </div>
                                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                                <p>L'email di {{ $message->firstName}} {{  $message->lastName}} sarà cancellata definitivamente, vuoi continuare?</p>
                                                <form action="{{ route('admin.email.hardDelete', ['email' => $message->id])}}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="py-1 px-4 mt-2 m-auto rounded border border-red-400 text-red-500 md:hover:bg-red-500 md:hover:text-white transition-all duration-150 ease-in-out" type="submit">Elimina</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>