@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Reports') }}</div>

                <div class="card-body">
                    <form action="{{ route('web.reports.update', $report) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="course">{{ __('Course') }}</label>
                            <select name="course_id" id="course_id" class="form-control custom-select" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $course->id }}" @if ($report->course_id === $course->id) selected @endif>{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="student">{{ __('Student') }}</label>
                            <select name="student_id" id="student_id" class="form-control custom-select" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $student->id }}" @if ($report->student_id === $student->id) selected @endif>{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="body">{{ __('Body') }}</label>
                            <input type="text" name="body" id="body" class="form-control" value="{{ old('body', $report->body) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $report->title) }}" required>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Update Reports') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
