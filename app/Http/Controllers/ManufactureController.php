<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufactureCreateRequest;
use App\Http\Requests\ManufactureUpdateRequest;
use App\Models\Manufacture;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    // Create Manufacture
    public function store(ManufactureCreateRequest $request) {
        $manufacture = Manufacture::create($request->all());

        if(!$manufacture) {
            return response()->json([
                "message" => "Manufacture could not be created"
            ], 500);
        }

        return response()->json(["manufacture" => $manufacture, "message" => "Manufacture created"], 201);
    }

    // Update Manufacture
    public function update(ManufactureUpdateRequest $request, $id) {
        $manufacture = Manufacture::find($id);
        if(!$manufacture) {
            return response()->json([
                "message" => "Manufacture could not be found"
            ], 404);
        }

        $update = $manufacture->update($request->all());
        if(!$update) {
            return response()->json([
                "message" => "Manufacture could not be updated"
            ], 500);
        }

        return response()->json(["manufacture" => $manufacture, "message" => "Manufacture updated"], 200);
    }

    // Delete Manufacture
    public function delete($id) {
        $manufacture = Manufacture::find($id);
        if(!$manufacture) {
            return response()->json([
                "message" => "Manufacture could not be found"
            ], 404);
        }

        $delete = $manufacture->delete();
        if(!$delete) {
            return response()->json([
                "message" => "Manufacture could not be deleted"
            ], 500);
        }

        return response()->json([
            "message" => "Manufacture deleted"
        ], 200);
    }

    // Get Manufacture
    public function show($id) {
        $manufacture = Manufacture::find($id);
        if(!$manufacture) {
            return response()->json([
                "message" => "Manufacture could not be found"
            ], 404);
        }

        return response()->json($manufacture, 200);
    }

    // Get Manufactures
    public function index() {
        $manufactures = Manufacture::all();

        if(!$manufactures) {
            return response()->json([
                "message" => "Manufactures could not be found"
            ], 404);
        }

        return response()->json($manufactures, 200);
    }
}
