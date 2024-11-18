@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header">{{ __('Create Program') }}</div>    

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
                    <form action="{{ route('universityPrograms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="university_id" class="col-sm-4 col-form-label text-md-right">{{ __('University') }}</label>
                            <div class="col-md-6">
                            <select name="university_id" id="university_id" class="form-control">
                            @foreach($universities as $university)
                                <option value={{ $university->id }}>{{ $university->title }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="university_program_type_id" class="col-sm-4 col-form-label text-md-right">{{ __('Program Type') }}</label>
                            <div class="col-md-6">
                            <select name="university_program_type_id" id="university_program_type_id" class="form-control">
                            @foreach($universityProgramTypes as $universityProgramType)
                                <option value={{ $universityProgramType->id }}>{{ $universityProgramType->title }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="university_program_subject_type_id" class="col-sm-4 col-form-label text-md-right">{{ __('Subject Type') }}</label>
                            <div class="col-md-6">
                            <select name="university_program_subject_type_id" id="university_program_subject_type_id" class="form-control">
                            @foreach($universityProgramSubjectTypes as $universityProgramSubjectType)
                                <option value={{ $universityProgramSubjectType->id }}>{{ $universityProgramSubjectType->title }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                            <textarea id="description" name="description" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exam_requirement" class="col-sm-4 col-form-label text-md-right">{{ __('Exam Requirement') }}</label>
                            <div class="col-md-6">
                            <textarea id="exam_requirement" name="exam_requirement" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total_credit" class="col-sm-4 col-form-label text-md-right">{{ __('Total Credit') }}</label>
                            <div class="col-md-6">
                                <input id="total_credit" type="number" class="form-control" name="total_credit" value="{{ old('total_credit') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total_year" class="col-sm-4 col-form-label text-md-right">{{ __('Total Year') }}</label>
                            <div class="col-md-6">
                                <input id="total_year" type="number" class="form-control" name="total_year" value="{{ old('total_year') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="admission_cost" class="col-sm-4 col-form-label text-md-right">{{ __('Admission Cost') }}</label>
                            <div class="col-md-6">
                                <input id="admission_cost" type="number" class="form-control" name="admission_cost" value="{{ old('admission_cost') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total_cost" class="col-sm-4 col-form-label text-md-right">{{ __('Total Cost') }}</label>
                            <div class="col-md-6">
                                <input id="total_cost" type="number" class="form-control" name="total_cost" value="{{ old('total_cost') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="admission_link" class="col-sm-4 col-form-label text-md-right">{{ __('Admission Link') }}</label>
                            <div class="col-md-6">
                                <input id="admission_link" type="text" class="form-control" name="admission_link" value="{{ old('admission_link') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="online_form_link" class="col-sm-4 col-form-label text-md-right">{{ __('Online Form Lail') }}</label>
                            <div class="col-md-6">
                                <input id="online_form_link" type="text" class="form-control" name="online_form_link" value="{{ old('online_form_link') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="web_link" class="col-sm-4 col-form-label text-md-right">{{ __('Web Link') }}</label>
                            <div class="col-md-6">
                                <input id="web_link" type="text" class="form-control" name="web_link" value="{{ old('web_link') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exam_system" class="col-sm-4 col-form-label text-md-right">{{ __('Exam System') }}</label>
                            <div class="col-md-6">
                                <input id="exam_system" type="text" class="form-control" name="exam_system" value="{{ old('exam_system') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-sm-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <img class="h-auto rounded-lg w-100 col-md-4" alt="" id="output">
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