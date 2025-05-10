<?php

namespace App\Http\Controllers;

use App\Http\Resources\GamesResource;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GameController extends BaseController
{
    public function index()
    {
        $gameCategory = Game::with('gameCategory')->get();

        return $this->sendResponse(GamesResource::collection($gameCategory), 'Game retrieved successfully.');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'game_category_id' => 'required',
            'game_name' => 'required',
            'game_code' => 'required',
            'game_status' => 'required',
            'game_image' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $game = Game::create($input);

        return $this->sendResponse(new GamesResource($game), 'Game Category created successfully.');

    }

    public function show(Game $game)
    {
        //
    }

    public function edit(Game $game)
    {
        //
    }

    public function update(Request $request, Game $game)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'game_category_id' => 'required',
            'game_name' => 'required',
            'game_code' => 'required',
            'game_status' => 'required',
            'game_image' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $game->game_category_id = $input['game_category_id'];
        $game->game_name = $input['game_name'];
        $game->game_code = $input['game_code'];
        $game->game_status = $input['game_status'];
        $game->game_image = $input['game_image'];
        $game->save();

        return $this->sendResponse(new GamesResource($game), 'Game Category updated successfully.');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return $this->sendResponse([], 'Game deleted successfully.');
    }
}
