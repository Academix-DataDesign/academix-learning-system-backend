@extends('layouts.admin')
@section('content')

<div class="table-responsive"  style="padding: 20px">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created date</th>
                <th>Updated date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($languages as $language)
                <tr>
                    <td>{{ $language->id }}</td>
                    <td>{{ $language->name }}</td>
                    <td>{{ date('Y-m-d', strtotime($language->created_at)) }}</td>
                    <td>{{ date('Y-m-d', strtotime($language->updated_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $languages->links('pagination::bootstrap-5') }}
</div>


@stop
