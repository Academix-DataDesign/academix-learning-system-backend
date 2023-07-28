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
                    <td><form action="{{ route('currency.edit', ['id' => $currency->id]) }}" method="POST">
                         @csrf
                         @method('PUT')
                        <button type="submit" class="btn btn-primary">Edit Currency</button>
                        </form></td>
                    <td><form action="{{ route('currency.destroy', ['id' => $currency->id]) }}" method="POST">
                         @csrf
                        @method('DELETE')
                         <button type="submit" class="btn btn-danger">Delete Currency</button>
                         </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $currencies->links('pagination::bootstrap-5') }}
</div>


@stop
