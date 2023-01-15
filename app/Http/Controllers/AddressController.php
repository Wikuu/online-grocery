<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressCreateRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Models\Address;

class AddressController extends Controller
{
    // Create Address
    public function store(AddressCreateRequest $request) {
        $address = Address::create($request->all());

        if(!$address) {
            return response()->json([
                "message" => "Address could not be created"
            ], 500);
        }

        return response()->json(["address" => $address, "message" => "Address created"], 201);
    }

    // Update Address
    public function update(AddressUpdateRequest $request, $id) {
        $address = Address::find($id);
        if(!$address) {
            return response()->json([
                "message" => "Address could not be found"
            ], 404);
        }

        $update = $address->update($request->all());
        if(!$update) {
            return response()->json([
                "message" => "Address could not be updated"
            ], 500);
        }

        return response()->json(["address" => $address, "message" => "Address updated"], 200);
    }

    // Delete Address
    public function delete($id) {
        $address = Address::find($id);
        if(!$address) {
            return response()->json([
                "message" => "Address could not be found"
            ], 404);
        }

        $delete = $address->delete();
        if(!$delete) {
            return response()->json([
                "message" => "Address could not be deleted"
            ], 500);
        }

        return response()->json([
            "message" => "Address deleted"
        ], 200);
    }

    // Get Address
    public function show($id) {
        $address = Address::find($id);
        if(!$address) {
            return response()->json([
                "message" => "Address could not be found"
            ], 404);
        }

        return response()->json($address, 200);
    }

    // Get Addresses
    public function index() {
        $addresses = Address::all();

        if(!$addresses) {
            return response()->json([
                "message" => "Addresses could not be found"
            ], 404);
        }

        return response()->json($addresses, 200);
    }

    // Get Address by User
    public function showByUser($user_id) {
        $address = Address::where('user_id', $user_id)->first();

        if(!$address) {
            return response()->json([
                "message" => "Address could not be found"
            ], 404);
        }

        return response()->json($address, 200);
    }
}
