@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            {{ __('University') }}
                        </div>
                        <div>
                        <a href="{{ route('universities.create') }}" class="btn btn-sm btn-success">
                        Create
                        </a>
                        </div>
                    </div>    

                <div class="card-body">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>
                                <p>
                                    SL
                                </p>
                                </th>
                                <th>
                                    <p>
                                        Title
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        Divison
                                    </p>
                                </th>
                                <th>
                                <p>
                                    University Type
                                </p>
                                </th>
                                <th>
                                <p>
                                    Fund Type
                                </p>
                                </th>
                                <th>
                                <p>
                                    Program Count
                                </p>
                                </th>
                                <th>
                                <p>Action</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($universities as $university)
                            <tr>
                                <td>
                                <p>
                                {{ $loop->iteration }}
                                </p>
                                </td>
                                <td>
                                <p>
                                {{ $university->title }}
                                </p>
                                </td>
                                <td>
                                <p>
                                {{ $university->division->division_name_bn }}
                                </p>
                                </td>
                                <td>
                                <p>
                                {{ $university->universityType->title }}
                                </p>
                                </td>
                                <td>
                                <p>
                                {{ $university->universityFundType->title }}
                                </p>
                                </td>
                                <td>
                                <p>
                                {{ $university->university_programs_count }}
                                </p>
                                </td>
                                <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('universities.edit', $university) }}">
                                    Edit
                                </a>
                                <form action="{{ route('university.softDelete', $university) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    Delete
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
    </div>
</div>

@endsection
