@extends('layouts.admin')
@section('content')

<div class="table-responsive"  style="padding: 20px">
    <table class="table table-bordered">
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
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $newsletters->links('pagination::bootstrap-5') }}
</div>


@stop
