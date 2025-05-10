<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameCatalogsResource;
use App\Models\GameCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GameCategoryController extends BaseController
{

    public function index(): JsonResponse
    {
        $gameCategory = GameCategory::all();

        return $this->sendResponse(GameCatalogsResource::collection($gameCategory), 'Game Category retrieved successfully.');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'category_name' => 'required',
            'category_code' => 'required',
            'category_status' => 'required',
            'category_image' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $gameCategory = GameCategory::create($input);

        return $this->sendResponse(new GameCatalogsResource($gameCategory), 'Game Category created successfully.');

    }

    public function show($id)
    {
        $gameCategory = GameCategory::find($id);
        if (is_null($gameCategory)) {
            return $this->sendError('Game Category not found.');
        }
        return $this->sendResponse(new GameCatalogsResource($gameCategory), 'Game Category created successfully.');
    }

    public function edit(GameCategory $gameCategory)
    {
        //
    }

    public function update(Request $request, GameCategory $gameCategory)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'category_name' => 'required',
            'category_code' => 'required',
            'category_status' => 'required',
            'category_image' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $gameCategory->category_name = $input['category_name'];
        $gameCategory->category_code = $input['category_code'];
        $gameCategory->category_status = $input['category_status'];
        $gameCategory->category_image = $input['category_image'];
        $gameCategory->save();

        return $this->sendResponse(new GameCatalogsResource($gameCategory), 'Game Category updated successfully.');

    }

    public function destroy(GameCategory $gameCategory)
    {
        $gameCategory->delete();

        return $this->sendResponse([], 'Game Category deleted successfully.');
    }
}
