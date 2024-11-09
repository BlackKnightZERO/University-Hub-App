<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create District') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('districts.store') }}" method="POST">
                        @csrf
 
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" value="{{ old('title') }}" type="text" class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />

                            <x-input-label for="divison" value="Divison" class="mt-2" />
                            <select name="divison_id" id="" class="border-gray-310 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                @foreach($divisons as $divison)
                                <option value={{ $divison->id }}>{{ $divison->title }}</option>
                                @endforeach
                            </select>

                            <div class="inline-flex items-center mt-2">
                                <label class="flex items-center cursor-pointer relative" for="check-2">
                                    <input type="checkbox"
                                    name="status"
                                    checked
                                    class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                                    id="check-2" />
                                    <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                                        stroke="currentColor" stroke-width="1">
                                        <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                    </span>
                                </label>
                                <label class="cursor-pointer ml-2 text-slate-600 text-sm" for="check-2">
                                    Active
                                </label>
                            </div>
                        </div>
 
                        <div class="mt-4">
                            <x-primary-button>
                                Save
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>