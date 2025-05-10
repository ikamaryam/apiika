<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\GameCatalog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GameCatalogController extends BaseController
{
    public function index(): JsonResponse
    {
        $gameCatalogs = GameCatalog::all();

        return $this->sendResponse(GameResource::collection($gameCatalogs), 'Game Catalogs retrieved successfully.');
    }


    public function create()
    {
        //
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $gameCatalog = GameCatalog::create($input);

        return $this->sendResponse(new GameResource($gameCatalog), 'Game Catalog created successfully.');
    }

    public function show($id): JsonResponse
    {
        $gameCatalog = GameCatalog::find($id);

        if (is_null($gameCatalog)) {
            return $this->sendError('Game Catalog not found.');
        }

        return $this->sendResponse(new GameResource($gameCatalog), 'Game Catalog retrieved successfully.');
    }


    public function edit(GameCatalog $gameCatalog)
    {
        //
    }


    public function update(Request $request, GameCatalog $gameCatalog): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $gameCatalog->name = $input['name'];
        $gameCatalog->detail = $input['detail'];
        $gameCatalog->save();

        return $this->sendResponse(new GameResource($gameCatalog), 'Game Catalog updated successfully.');
    }


    public function destroy(GameCatalog $gameCatalog): JsonResponse
    {
        $gameCatalog->delete();

        return $this->sendResponse([], 'Game Catalog deleted successfully.');
    }
}
