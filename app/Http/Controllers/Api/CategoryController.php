<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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
        $cacheKey = 'categories';
        $expirationTime = 60;

        if (Redis::exists($cacheKey)) {
            $categories = json_decode(Redis::get($cacheKey));
        } else {
            $categories = Category::all();
            Redis::set($cacheKey, json_encode($categories));
            Redis::expire($cacheKey, $expirationTime);
        }

        return CategoryResource::collection($categories);
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

        $category = Category::create([
            'name' => $request->name,
        ]);

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $category = Category::findOrFail($id);

            return new CategoryResource($category);
        } catch (ModelNotFoundException $exception) {
            throw new ModelNotFoundException('Category not found', $exception->getCode(), $exception);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,' . $category->id . '|max:255',
            'description' => 'required',
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

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        Redis::del('categories');

        return new CategoryResource($category, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Redis::del('categories');

        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully.',
        ], Response::HTTP_OK);
    }
}
