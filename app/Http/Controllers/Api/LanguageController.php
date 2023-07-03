<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Resources\LanguageResource;
use Illuminate\Support\Facades\Redis;

class LanguageController extends Controller
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
        $cacheKey = 'languages';
        $expirationTime = 60;

        if (Redis::exists($cacheKey)) {
            $languages = json_decode(Redis::get($cacheKey));
        } else {
            $languages = Language::all();
        }

        Redis::set($cacheKey, json_encode($languages));
        Redis::expire($cacheKey, $expirationTime);

        return LanguageResource::collection($languages);
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
