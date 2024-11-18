@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            {{ __('Program') }}
                        </div>
                        <div>
                        <a href="{{ route('universityPrograms.create') }}" class="btn btn-sm btn-success">
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
                                    University
                                    </p>
                                </th>
                                <th>
                                <p>
                                University Program Type
                                </p>
                                </th>
                                <th>
                                <p>
                                Total Credit
                                </p>
                                </th>
                                <th>
                                <p>Action</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($universityPrograms as $universityProgram)
                            <tr>
                                <td>
                                <p>
                                {{ $loop->iteration }}
                                </p>
                                </td>
                                <td>
                                <p>
                                {{ $universityProgram->title }}
                                </p>
                                </td>
                                <td>
                                <p>
                                {{ $universityProgram->university->title }}
                                </p>
                                </td>
                                <td>
                                <p>
                                {{ $universityProgram->universityProgramType->title }}
                                </p>
                                </td>
                                <td>
                                <p>
                                {{ $universityProgram->total_credit }}
                                </p>
                                </td>
                                <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('universityPrograms.edit', $universityProgram) }}">
                                    Edit
                                </a>
                                <form action="{{ route('program.softDelete', $universityProgram) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
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
