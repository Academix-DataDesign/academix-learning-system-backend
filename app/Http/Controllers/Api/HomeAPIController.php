<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\HomeResource;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\Comment;

class HomeAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    function home() {
        $userCount = User::count();
        $instructorCount = User::where('type_id', 2)->count();
        $lessons = Lesson::count();
        $hours = Lesson::count();
        $featuredCategories = Category::take(5)->get();
        $topComments = Comment::take(5)->orderBy('id', 'desc')->get();

        $homeArray = [
            'userCount' => $userCount,
            'instructorCount' => $instructorCount,
            'lessons' => $lessons,
            'hours' => $hours,
            'featuredCategories' => $featuredCategories,
            'topComments' => $topComments
        ];

        return new HomeResource(((object) $homeArray));
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
