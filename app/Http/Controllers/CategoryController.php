<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Create Category
    public function store(CategoryCreateRequest $request) {
        $category = Category::create($request->all());

        if(!$category) {
            return response()->json([
                "message" => "Category could not be created"
            ], 500);
        }

        return response()->json(["category" => $category, "message" => "Category created"], 201);
    }

    // Update Category
    public function update(CategoryUpdateRequest $request, $id) {
        $category = Category::find($id);
        if(!$category) {
            return response()->json([
                "message" => "Category could not be found"
            ], 404);
        }

        $update = $category->update($request->all());
        if(!$update) {
            return response()->json([
                "message" => "Category could not be updated"
            ], 500);
        }

        return response()->json(["category" => $category, "message" => "Category updated"], 200);
    }

    // Delete Category
    public function delete($id) {
        $category = Category::find($id);
        if(!$category) {
            return response()->json([
                "message" => "Category could not be found"
            ], 404);
        }

        $delete = $category->delete();
        if(!$delete) {
            return response()->json([
                "message" => "Category could not be deleted"
            ], 500);
        }

        return response()->json([
            "message" => "Category deleted"
        ], 200);
    }

    // Get Category
    public function show($id) {
        $category = Category::find($id);
        if(!$category) {
            return response()->json([
                "message" => "Category could not be found"
            ], 404);
        }

        return response()->json($category, 200);
    }

    // Get Categories
    public function index() {
        $categories = Category::all();

        if(!$categories) {
            return response()->json([
                "message" => "Categories could not be found"
            ], 404);
        }

        return response()->json($categories, 200);
    }
}
