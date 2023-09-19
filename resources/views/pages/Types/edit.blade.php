@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Types') }}</div>

                <div class="card-body">
                    <form action="{{ route('web.types.update', $type) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="name" name="name" id="name" class="form-control" value="{{ old('name', $type->name) }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Update Type') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
