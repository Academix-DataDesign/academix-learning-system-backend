@extends('layouts.admin')
@section('content')

<div class="table-responsive"  style="padding: 20px">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course</th>
                <th>Student</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created date</th>
                <th>Updated date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->course->title }}</td>
                    <td>{{ $report->student->name }}</td>
                    <td>{{ $report->title }}</td>
                    <td>{{ $report->description }}</td>
                    <td>{{ date('Y-m-d', strtotime($report->created_at)) }}</td>
                    <td>{{ date('Y-m-d', strtotime($report->updated_at)) }}</td>
                    <td><form action="{{ route('report.edit', ['id' => $report->id]) }}" method="POST">
                         @csrf
                         @method('PUT')
                        <button type="submit" class="btn btn-primary">Edit Report</button>
                        </form></td>
                    <td><form action="{{ route('report.destroy', ['id' => $report->id]) }}" method="POST">
                         @csrf
                        @method('DELETE')
                         <button type="submit" class="btn btn-danger">Delete Report</button>
                         </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $reports->links('pagination::bootstrap-5') }}
</div>


@stop
