@extends('layouts.admin')
@section('content')

<div class="table-responsive"  style="padding: 20px">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($currencies as $currency)
                <tr>
                    <td>{{ $currency->id }}</td>
                    <td>{{ $currency->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $currencies->links('pagination::bootstrap-5') }}
</div>


@stop
