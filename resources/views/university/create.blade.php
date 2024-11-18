@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header">{{ __('Create University') }}</div>    

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
                    <form action="{{ route('universities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="division_id" class="col-sm-4 col-form-label text-md-right">{{ __('Division') }}</label>
                            <div class="col-md-6">
                            <select name="division_id" id="" class="form-control">
                                @foreach($divisions as $division)
                                <option value={{ $division->id }}>{{ $division->division_name_bn }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="university_fund_type_id" class="col-sm-4 col-form-label text-md-right">{{ __('Fund Type') }}</label>
                            <div class="col-md-6">
                            <select name="university_fund_type_id" id="university_fund_type_id" class="form-control">
                                @foreach($universityFundTypes as $universityFundType)
                                <option value={{ $universityFundType->id }}>{{ $universityFundType->title }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="university_program_type_id" class="col-sm-4 col-form-label text-md-right">{{ __('Program Type') }}</label>
                            <div class="col-md-6">
                            <select multiple name="university_program_type_id[]" id="" class="form-control">
                                @foreach($universityProgramTypes as $universityProgramType)
                                <option value={{ $universityProgramType->id }}>{{ $universityProgramType->title }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="university_type_id" class="col-sm-4 col-form-label text-md-right">{{ __('University Type') }}</label>
                            <div class="col-md-6">
                            <select name="university_type_id" id="" class="form-control">
                                @foreach($universityTypes as $universityType)
                                <option value={{ $universityType->id }}>{{ $universityType->title }}</option>
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
                            <label for="short_links" class="col-sm-4 col-form-label text-md-right">{{ __('Short Links') }}</label>
                            <div class="col-md-6">
                            <textarea id="short_links" name="short_links" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="seat_count" class="col-sm-4 col-form-label text-md-right">{{ __('Seat Count') }}</label>
                            <div class="col-md-6">
                                <input id="seat_count" type="number" class="form-control" name="seat_count" value="{{ old('seat_count') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-sm-4 col-form-label text-md-right">{{ __('Contact') }}</label>
                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control" name="contact" value="{{ old('contact') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gmap_link" class="col-sm-4 col-form-label text-md-right">{{ __('Gmap Link') }}</label>
                            <div class="col-md-6">
                                <input id="gmap_link" type="text" class="form-control" name="gmap_link" value="{{ old('gmap_link') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="web_link" class="col-sm-4 col-form-label text-md-right">{{ __('Web Link') }}</label>
                            <div class="col-md-6">
                                <input id="web_link" type="text" class="form-control" name="web_link" value="{{ old('web_link') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_register" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Register') }}</label>
                            <div class="col-md-6">
                                <input id="email_register" type="text" class="form-control" name="email_register" value="{{ old('email_register') }}">
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