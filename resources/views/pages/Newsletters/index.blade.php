@extends('layouts.admin')

@section('title')
    Academix | Newsletters
@stop

@section('param')
    Newsletters
@stop

@section('header')
    <h1>{{ __('Newsletters') }}</h1>
@stop

@section('content')

    <div class="table-responsive" style="padding: 20px">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Created date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newsletters as $newsletter)
                    <tr>
                        <td>{{ $newsletter->id }}</td>
                        <td>{{ $newsletter->student->name }}</td>
                        <td>{{ date('Y-m-d', strtotime($newsletter->updated_at)) }}</td>
                        <td>
                            <form action="{{ route('newsletter.edit', ['id' => $newsletter->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Edit Newsletter</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('newsletter.destroy', ['id' => $newsletter->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Newsletter</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $newsletters->links('pagination::bootstrap-5') }}
    </div>


@stop
