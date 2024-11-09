<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Divisons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- <div class="max-w-xl"> -->
                    <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
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
                                <p class="block text-sm font-normal leading-none text-slate-500"></p>
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
                                <a href="#" class="text-sm font-semibold text-blue-600">
                                    Edit
                                </a>&nbsp;|&nbsp;
                                <a href="#" class="text-sm font-semibold text-red-600">
                                    Delete
                                </a>
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
