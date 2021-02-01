<?php

namespace App\Http\Controllers\api\v1\recipes;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePutRequest;
use App\Models\Receipts;

class ReceiptController extends Controller
{
    public function store(StorePostRequest $request)
    {
        if ($request->validated()) {
            $receipt = new Receipts();
            $receipt->user_id = $request->user_id;
            $receipt->name = $request->name;
            $receipt->ingredients = $request->ingredients;
            $receipt->description = $request->description;

            if ($receipt->save()) {
                return response()->json(['Success added']);
            } else {
                return response()->json(['Db error'], 500);
            }
        }
        return response()->json(['Params error'], 400);
    }

    public function update(UpdatePutRequest $request, $id)
    {
        if ($request->validated()) {
            $receipt = Receipts::find($id);
            $receipt->user_id = $request->user_id;
            $receipt->name = $request->name;
            $receipt->ingredients = $request->ingredients;
            $receipt->description = $request->description;

            if ($receipt->save()) {
                return response()->json(['Success updated']);
            } else {
                return response()->json(['Db error'], 500);
            }
        }
        return response()->json(['Params error'], 400);
    }
}
