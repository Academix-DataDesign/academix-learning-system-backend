<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Resources\TypeResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
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
        $cacheKey = 'types';
        $expirationTime = 60;

        if (Redis::exists($cacheKey)) {
            $types = json_decode(Redis::get($cacheKey));
        } else {
            $types = Type::all();

            Redis::set($cacheKey, json_encode($types));
            Redis::expire($cacheKey, $expirationTime);
        }

        return TypeResource::collection($types);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|max:255',
        ], [
            'name.unique' => 'The category name already exists.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'error-0003',
                'timestamp' => now(),
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
                'path' => url()->current(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $type = Type::create([
            'name' => $request->name,
        ]);

        return new TypeResource($type);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $type = Type::findOrFail($id);

            return new TypeResource($type);
        } catch (ModelNotFoundException $exception) {
            throw new ModelNotFoundException('Type not found', $exception->getCode(), $exception);
        }
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
        $type = Type::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|max:255',
        ], [
            'name.unique' => 'The category name already exists.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'error-0003',
                'timestamp' => now(),
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
                'path' => url()->current(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $type->name = $request->name;
        $type->save();

        Redis::del('types');

        return new TypeResource($type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        Redis::del('categories');

        return response()->json([
            'status' => true,
            'message' => 'Type deleted successfully.',
        ], Response::HTTP_OK);
    }
}
