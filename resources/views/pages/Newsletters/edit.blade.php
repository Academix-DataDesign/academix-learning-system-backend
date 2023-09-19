@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Newsletters') }}</div>

                <div class="card-body">
                    <form action="{{ route('web.newsletters.update', $newsletter) }}" method="POST">
                        @csrf
                        @method('PUT')

    

                        <div class="form-group">
                            <label for="student">{{ __('Student') }}</label>
                            <select name="student_id" id="student_id" class="form-control custom-select" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $student->id }}" @if ($newsletter->student_id === $student->id) selected @endif>{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Update Newsletters') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
