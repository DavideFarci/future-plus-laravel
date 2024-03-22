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
                            <tr class="odd:bg-slate-300 dark:odd:bg-slate-700 hover:opacity-60">
                                <td 
                                    class="p-2 text-sm font-semibold md:hover:cursor-pointer"
                                    onclick="window.location.href='{{ route('admin.email.show', $message->id) }}'"
                                >
                                    {{ $message->firstName}} {{ $message->lastName }}
                                </td>
                                <td 
                                    class="p-2 text-xs block truncat md:hover:cursor-pointere"
                                    onclick="window.location.href='{{ route('admin.email.show', $message->id) }}'"
                                >
                                        {{ $message->message }}
                                </td>
                                <td 
                                    class="hidden md:table-cell text-right p-2 text-xs md:hover:cursor-pointer"
                                    onclick="window.location.href='{{ route('admin.email.show', $message->id) }}'"
                                >
                                    {{ date('d/m/Y H:i', strtotime($message->created_at)) }}
                                </td>
                                <td class="p-2 text-sm text-right ">
                                    <button>X</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>