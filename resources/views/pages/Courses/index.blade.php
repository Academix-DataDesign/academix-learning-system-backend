@extends('layouts.admin')

@section('title')
<h1>Courses</h1>
@stop

@section('content')

<div class="table-responsive"  style="padding: 20px">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Instructor</th>
                <th>Description</th>
                <th>Level</th>
                <th>Category</th>
                <th>Status</th>
                <th>Language</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->instructor->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->level->name }}</td>
                    <td>{{ $course->category->name }}</td>
                    <td>{{ $course->status->name }}</td>
                    <td>{{ $course->language->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $courses->links('pagination::bootstrap-5') }}
</div>


@stop
