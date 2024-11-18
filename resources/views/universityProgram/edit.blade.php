@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header">{{ __('Edit Program') }}</div>    

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('universityPrograms.update', $universityProgram) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $universityProgram->title) }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="university_id" class="col-sm-4 col-form-label text-md-right">{{ __('University') }}</label>
                            <div class="col-md-6">
                            <select name="university_id" id="university_id" class="form-control">
                            @foreach($universities as $university)
                                <option value={{ $university->id }}
                                    @if($university->id == $universityProgram->university->id) selected @endif>{{ $university->title }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="university_program_type_id" class="col-sm-4 col-form-label text-md-right">{{ __('Program Type') }}</label>
                            <div class="col-md-6">
                            <select name="university_program_type_id" id="university_program_type_id" class="form-control">
                            @foreach($universityProgramTypes as $universityProgramType)
                                <option value={{ $universityProgramType->id }}
                                    @if($universityProgramType->id == $universityProgram->universityProgramType->id) selected @endif>{{ $universityProgramType->title }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="university_program_subject_type_id" class="col-sm-4 col-form-label text-md-right">{{ __('Subject Type') }}</label>
                            <div class="col-md-6">
                            <select name="university_program_subject_type_id" id="university_program_subject_type_id" class="form-control">
                            @foreach($universityProgramSubjectTypes as $universityProgramSubjectType)
                                <option value={{ $universityProgramSubjectType->id }}
                                    @if($universityProgramSubjectType->id == $universityProgram->universityProgramSubjectType->id) selected @endif>{{ $universityProgramSubjectType->title }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                            <textarea id="description" name="description" rows="4" class="form-control">{{$universityProgram->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exam_requirement" class="col-sm-4 col-form-label text-md-right">{{ __('Exam Requirement') }}</label>
                            <div class="col-md-6">
                            <textarea id="exam_requirement" name="exam_requirement" rows="4" class="form-control">{{ $universityProgram->exam_requirement }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total_credit" class="col-sm-4 col-form-label text-md-right">{{ __('Total Credit') }}</label>
                            <div class="col-md-6">
                                <input id="total_credit" type="number" class="form-control" name="total_credit" value="{{ old('total_credit', $universityProgram->total_credit) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total_year" class="col-sm-4 col-form-label text-md-right">{{ __('Total Year') }}</label>
                            <div class="col-md-6">
                                <input id="total_year" type="number" class="form-control" name="total_year" value="{{ old('total_year', $universityProgram->total_year) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="admission_cost" class="col-sm-4 col-form-label text-md-right">{{ __('Admission Cost') }}</label>
                            <div class="col-md-6">
                                <input id="admission_cost" type="number" class="form-control" name="admission_cost" value="{{ old('admission_cost', $universityProgram->admission_cost) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total_cost" class="col-sm-4 col-form-label text-md-right">{{ __('Total Cost') }}</label>
                            <div class="col-md-6">
                                <input id="total_cost" type="number" class="form-control" name="total_cost" value="{{ old('total_cost', $universityProgram->total_cost) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="admission_link" class="col-sm-4 col-form-label text-md-right">{{ __('Admission Link') }}</label>
                            <div class="col-md-6">
                                <input id="admission_link" type="text" class="form-control" name="admission_link" value="{{ old('admission_link', $universityProgram->admission_link) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="online_form_link" class="col-sm-4 col-form-label text-md-right">{{ __('Online Form Lail') }}</label>
                            <div class="col-md-6">
                                <input id="online_form_link" type="text" class="form-control" name="online_form_link" value="{{ old('online_form_link', $universityProgram->online_form_link) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="web_link" class="col-sm-4 col-form-label text-md-right">{{ __('Web Link') }}</label>
                            <div class="col-md-6">
                                <input id="web_link" type="text" class="form-control" name="web_link" value="{{ old('web_link', $universityProgram->web_link) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exam_system" class="col-sm-4 col-form-label text-md-right">{{ __('Exam System') }}</label>
                            <div class="col-md-6">
                                <input id="exam_system" type="text" class="form-control" name="exam_system" value="{{ old('exam_system', $universityProgram->exam_system) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <img src="{{ asset('/storage').'/'.$storagePath }}" class="h-auto rounded-lg w-100 col-md-4" alt="" id="output">
                                <div id="cancel_img" class="invisible mt-2">
                                    <button id="cancel_img_btn" onclick="cancelFile(event)">Cancel</button>
                                </div>
                                    <br>
                                    <input type="file" 
                                    id="file_id"
                                    class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                                    name="img"
                                    value="Upload"
                                    onchange="loadFile(event)"
                                    >
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        var loadFile = function(event) {
          var output = document.getElementById('output');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
          document.getElementById('cancel_img').classList.remove('invisible');
        };
        var cancelFile = function(event) {
            event.preventDefault();
            document.getElementById('file_id').value = '';
            document.getElementById('output').src = '';
            document.getElementById('cancel_img').classList.add('invisible');
        }
    </script>
@endsection
<!-- <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit University Program') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="overflow-hidden overflow-x-auto border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('universityPrograms.update', $universityProgram) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" value="{{ old('title', $universityProgram->title) }}" type="text" class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />

                            <x-input-label for="university_id" value="University" class="mt-2" />
                            <select name="university_id" id="" class="border-gray-310 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                @foreach($universities as $university)
                                <option value={{ $university->id }} 
                                    @selected($university->id == $universityProgram->university->id)>{{ $university->title }}</option>
                                @endforeach
                            </select>

                            <x-input-label for="university_program_type_id" value="Program Type" class="mt-2" />
                            <select name="university_program_type_id" id="" class="border-gray-310 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                @foreach($universityProgramTypes as $universityProgramType)
                                <option value={{ $universityProgramType->id }}
                                @selected($universityProgramType->id == $universityProgram->universityProgramType->id)>{{ $universityProgramType->title }}</option>
                                @endforeach
                            </select>

                            <x-input-label for="university_program_subject_type_id" value="Subject Type" class="mt-2" />
                            <select name="university_program_subject_type_id" id="" class="border-gray-310 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                @foreach($universityProgramSubjectTypes as $universityProgramSubjectType)
                                <option value={{ $universityProgramSubjectType->id }}
                                @selected($universityProgramSubjectType->id == $universityProgram->universityProgramSubjectType->id)
                                >{{ $universityProgramSubjectType->title }}</option>
                                @endforeach
                            </select>

                            <x-input-label for="description" value="Description" class="mt-2" />
                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$universityProgram->description}}</textarea>
                        
                            <x-input-label for="total_credit" value="Total Credit" class="mt-2" />
                            <x-text-input id="total_credit" name="total_credit" value="{{ old('total_credit', $universityProgram->total_credit) }}" type="text" class="block mt-1 w-full" />
                            
                            <x-input-label for="total_year" value="Total Year" class="mt-2" />
                            <x-text-input id="total_year" name="total_year" value="{{ old('total_year', $universityProgram->total_year) }}" type="text" class="block mt-1 w-full" />
                            
                            <x-input-label for="admission_cost" value="Admission Cost" class="mt-2" />
                            <x-text-input id="admission_cost" name="admission_cost" value="{{ old('admission_cost', $universityProgram->admission_cost) }}" type="text" class="block mt-1 w-full" />
                            
                            <x-input-label for="total_cost" value="Total Cost" class="mt-2" />
                            <x-text-input id="total_cost" name="total_cost" value="{{ old('total_cost', $universityProgram->total_cost) }}" type="text" class="block mt-1 w-full" />
                            
                            <x-input-label for="admission_link" value="Admission Link" class="mt-2" />
                            <x-text-input id="admission_link" name="admission_link" value="{{ old('admission_link', $universityProgram->admission_link) }}" type="text" class="block mt-1 w-full" />
                            
                            <x-input-label for="online_form_link" value="Admission Link" class="mt-2" />
                            <x-text-input id="online_form_link" name="online_form_link" value="{{ old('online_form_link', $universityProgram->online_form_link) }}" type="text" class="block mt-1 w-full" />
                            
                            <x-input-label for="web_link" value="Web Link" class="mt-2" />
                            <x-text-input id="web_link" name="web_link" value="{{ old('web_link', $universityProgram->web_link) }}" type="text" class="block mt-1 w-full" />
                            
                            <x-input-label for="exam_system" value="Exam System" class="mt-2" />
                            <x-text-input id="exam_system" name="exam_system" value="{{ old('exam_system', $universityProgram->exam_system) }}" type="text" class="block mt-1 w-full" />
                            
                            <x-input-label for="exam_requirement" value="Exam Requirement" class="mt-2" />
                            <textarea id="exam_requirement" name="exam_requirement" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $universityProgram->exam_requirement }}</textarea>
                            
                            <x-input-label for="img" value="Image" class="mt-2" />
                            <img src="{{ asset('/storage').'/'.$storagePath }}" class="h-auto rounded-lg w-full md:w-4/12" alt="" id="output">
                            <div id="cancel_img" class="invisible mt-2">
                                <button id="cancel_img_btn" onclick="cancelFile(event)">Cancel</button>
                            </div>
                                <br>
                                <input type="file" 
                                id="file_id"
                                class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                                name="img"
                                value="Upload"
                                onchange="loadFile(event)"
                                >
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
    <script>
        var loadFile = function(event) {
          var output = document.getElementById('output');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
          document.getElementById('cancel_img').classList.remove('invisible');
        };
        var cancelFile = function(event) {
            event.preventDefault();
            document.getElementById('file_id').value = '';
            document.getElementById('output').src = '';
            document.getElementById('cancel_img').classList.add('invisible');
        }
    </script>
</x-app-layout> -->