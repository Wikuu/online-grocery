<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Create Product
    public function store(ProductCreateRequest $request)
    {
        // Upload Image
        try {
            $imageName = time() . '.' . $request->file("image")->extension();
            $request->image->move(public_path('images'), $imageName);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Something went wrong while creating.",
                "error" => $th
            ], 500);
        }

        $data = $request->except("category_id");
        $data["image"] = $imageName;

        $product = Product::create($data);

        if (!$product) {
            return response()->json([
                "message" => "Product could not be created"
            ], 500);
        }

        $categoryProduct = CategoryProduct::create([
            "category_id" => $request->category_id,
            "product_id" => $product->id
        ]);

        if(!$categoryProduct) {
            return response()->json([
                "message" => "Product could not added to category"
            ], 500);
        }

        return response()->json(["product" => $product, "message" => "Product created"], 201);
    }

    // Update Product
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "message" => "Product could not be found"
            ], 404);
        }

        $update = $product->update($request->all());

        if($request->has("category_id")) {
            $categoryProduct = CategoryProduct::where("product_id", $id)->first();
            $categoryProduct->update([
                "category_id" => $request->category_id
            ]);
        }

        if (!$update) {
            return response()->json([
                "message" => "Product could not be updated"
            ], 500);
        }

        return response()->json(["product" => $product, "message" => "Product updated"], 200);
    }

    // Delete Product
    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                "message" => "Product could not be found"
            ], 404);
        }

        $delete = $product->delete();
        if (!$delete) {
            return response()->json([
                "message" => "Product could not be deleted"
            ], 500);
        }

        return response()->json([
            "message" => "Product deleted"
        ], 200);
    }

    // Get Product
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                "message" => "Product could not be found"
            ], 404);
        }

        return response()->json($product, 200);
    }

    // Get Categories
    public function index()
    {
        $products = Product::all();

        if (!$products) {
            return response()->json([
                "message" => "Products could not be found"
            ], 404);
        }

        return response()->json($products, 200);
    }
}
