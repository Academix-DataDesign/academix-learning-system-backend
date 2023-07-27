<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Currency;
use App\Models\Newsletter;
use App\Models\Release;
use App\Models\Report;
use App\Models\Type;
use App\Models\Language;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counts = [
            'courses' => Course::count(),
            'types' => Type::count(),
            'languages' => Language::count(),
            'currencies' => Currency::count(),
            'reports' => Report::count(),
            'releases' => Release::count(),
            'newsletters' => Newsletter::count(),
        ];

        return view('admin.index', compact('counts'));
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
