@extends('layouts.admin')
@section('content')

<div class="table-responsive" style="padding: 20px">
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
                    <td><form action="{{ route('courses.edit', ['id' => $course->id]) }}" method="POST">
                         @csrf
                         @method('PUT')
                        <button type="submit" class="btn btn-primary">Edit Course</button>
                        </form></td>
                    <td><form action="{{ route('courses.destroy', ['id' => $course->id]) }}" method="POST">
                         @csrf
                        @method('DELETE')
                         <button type="submit" class="btn btn-danger">Delete Course</button>
                         </form></td>
                </tr>

            @endforeach
        </tbody>
    </table>
    {{ $courses->links('pagination::bootstrap-5') }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let descriptions = document.querySelectorAll('.course-description');

        descriptions.forEach((description) => {
            let text = description.textContent;
            let wordsPerLine = 10;
            let wordArray = text.split(' ');
            let lines = [];

            for (let i = 0; i < wordArray.length; i += wordsPerLine) {
                let line = wordArray.slice(i, i + wordsPerLine).join(' ');
                lines.push(line);
            }

            description.innerHTML = lines.join('<br>');
        });
    });
</script>



@stop
