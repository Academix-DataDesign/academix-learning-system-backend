@extends('layouts.admin')
@section('content')

<div class="table-responsive"  style="padding: 20px">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Instructor</th>
                <th>Posted on</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->title }}</td>
                    <td>{{ $result->instructor->name }}</td>
                    <td>{{ date('Y-m-d', strtotime($result->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $results->links('pagination::bootstrap-5') }}
</div>


@stop