@extends('layouts.admin')

@section('title')
    <h1>{{ __('Languages') }}</h1>
@stop

@section('content')

    <div class="table-responsive" style="padding: 20px">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created date</th>
                    <th>Updated date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($languages as $language)
                    <tr>
                        <td>{{ $language->id }}</td>
                        <td>{{ $language->name }}</td>
                        <td>{{ date('Y-m-d', strtotime($language->created_at)) }}</td>
                        <td>{{ date('Y-m-d', strtotime($language->updated_at)) }}</td>
                        <td>
                            <form action="{{ route('language.edit', ['id' => $language->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Edit Language</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('language.destroy', ['id' => $language->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Language</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $languages->links('pagination::bootstrap-5') }}
    </div>


@stop
