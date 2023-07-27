@extends('layouts.admin')
@section('content')

<div class="table-responsive"  style="padding: 20px">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Instructor</th>
                <th>Title</th>
                <th>Link</th>
                <th>Created date</th>
                <th>Updated date</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($releases as $release)
                <tr>
                    <td>{{ $release->id }}</td>
                    <td>{{ $release->instructor->name }}</td>
                    <td>{{ $release->title }}</td>
                    <td>{{ $release->link }}</td>
                    <td>{{ date('Y-m-d', strtotime($release->created_at)) }}</td>
                    <td>{{ date('Y-m-d', strtotime($release->updated_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $releases->links('pagination::bootstrap-5') }}
</div>


@stop
