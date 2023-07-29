@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Course') }}</div>

                <div class="card-body">
                    <form action="{{ route('web.courses.update', $course) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $course->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category">{{ __('Category') }}</label>
                            <select name="category_id" id="category_id" class="form-control custom-select" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($course->category_id === $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">{{ __('Status') }}</label>
                            <select name="status_id" id="status_id" class="form-control custom-select" required>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" @if ($course->status_id === $status->id) selected @endif>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="language">{{ __('Language') }}</label>
                            <select name="language_id" id="language_id" class="form-control custom-select" required>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}" @if ($course->language_id === $language->id) selected @endif>{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Update Course') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
