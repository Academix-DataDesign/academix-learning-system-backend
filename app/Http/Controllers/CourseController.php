<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Status;
use App\Models\Language;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('category', 'instructor', 'level', 'status', 'language')->paginate(10);

        return view('pages.Courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $course->load('category', 'status', 'language');

        $categories = Category::select('name', 'id')->get();
        $statuses = Status::select('name', 'id')->get();
        $languages = Language::select('name', 'id')->get();

        return view('pages.Courses.edit', compact('course', 'categories', 'statuses', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return redirect()->route('web.courses.index')->with('success-updated', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('web.courses.index')->with('success-deleted', 'Course deleted successfully.');
    }
}
