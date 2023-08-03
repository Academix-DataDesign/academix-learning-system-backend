@extends('layouts.admin')

@section('title')
    Academix | Courses
@stop

@section('param')
    Courses
@stop

@section('header')
    <h1>{{ __('Courses') }}</h1>
@stop

@section('content')
    <div class="table-responsive" style="padding: 20px">

        <x-alert-message sessionName="success-updated" type="success" />

        @if ($courses->isEmpty())
            <div class="alert alert-info mt-3">
                No courses found.
            </div>
        @else
            <table class="table table-bordered table-striped">
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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->instructor->name }}</td>
                            <td class="course-description">{{ $course->description }}</td>
                            <td>{{ $course->level->name }}</td>
                            <td>{{ $course->category->name }}</td>
                            <td>{{ $course->status->name }}</td>
                            <td>{{ $course->language->name }}</td>
                            <td>
                                <a href="{{ route('web.courses.edit', $course->title) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form class="delete-course-form" data-course-id="{{ $course->id }}"
                                    action="{{ route('web.courses.destroy', $course->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $courses->links('pagination::bootstrap-5') }}
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src={{ asset('dist/js/script.js') }}></script>
@stop
