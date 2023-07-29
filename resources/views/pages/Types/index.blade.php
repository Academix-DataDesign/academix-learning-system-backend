@extends('layouts.admin')

@section('title')
    Academix | Types
@stop

@section('param')
    Types
@stop

@section('header')
    <h1>{{ __('Types') }}</h1>
@stop

@section('content')

    <div class="table-responsive" style="padding: 20px">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>
                            <form action="{{ route('type.edit', ['id' => $type->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Edit Type</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('type.destroy', ['id' => $type->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Type</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $types->links('pagination::bootstrap-5') }}
    </div>


@stop
