<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Resources\ReportResource;
use Illuminate\Support\Facades\Redis;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cacheKey = 'reports';
        // $expirationTime = 60;

        // if (Redis::exists($cacheKey)) {
        //     $reports = json_decode(Redis::get($cacheKey));
        // } else {
        //     $reports = Report::with('course', 'student')->paginate(10);
        //     Redis::set($cacheKey, json_encode($reports));
        //     Redis::expire($cacheKey, $expirationTime);
        // }

        // return ReportResource::collection($reports);
        return ReportResource::collection(Report::paginate(10));
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
