<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Divisons') }}
            <span class="float-right">
            <a href="{{ route('divisons.create') }}"
                       class="mb-4 inline-flex items-center rounded-md border border-green-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-green-700 shadow-sm transition duration-150 ease-in-out hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                        Create
                    </a>
            </span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- <div class="max-w-xl"> -->
                    <div class="relative overflow-auto flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                        <table class="w-full text-left table-auto min-w-max">
                            <thead>
                            <tr>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    SL
                                </p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-normal leading-none text-slate-500">
                                        Title
                                    </p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    Status
                                </p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">Action</p>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($divisons as $divison)
                            <tr class="hover:bg-slate-50">
                                <td class="p-4 border-b border-slate-200">
                                <p class="block text-sm text-slate-800">
                                {{ $loop->iteration }}
                                </p>
                                </td>
                                <td class="p-4 border-b border-slate-200">
                                <p class="block text-sm text-slate-800">
                                {{ $divison->title }}
                                </p>
                                </td>
                                <td class="p-4 border-b border-slate-200">
                                <p class="block text-sm text-slate-800">
                                {{ $divison->status }}
                                </p>
                                </td>
                                <td class="p-4 border-b border-slate-200">
                                <a href="{{ route('divisons.edit', $divison) }}" class="text-sm font-semibold text-blue-600">
                                    Edit
                                </a>&nbsp;|&nbsp;
                                <form action="{{ route('divisons.destroy', $divison) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                <button class="text-sm font-semibold text-red-600">
                                    Delete
                                </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
 
                <!-- </div> -->
            </div>
        </div>
    </div>
</x-app-layout>
