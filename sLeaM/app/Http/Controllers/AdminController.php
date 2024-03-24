<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\ImageFile;

class AdminController extends Controller
{
    public function dashboardPage(){
        return view('admin.dashboard'); 
    }

    public function addGamePage(){
        return view('admin.addGamePage');
    }

    public function gamePage(){
        return view('admin.gamePage', [
            'games' => Game::paginate(5)
        ]);
    }

    public function editPage($game_id){
        return view('admin.editGamePage', [
            'game' => Game::find($game_id)
        ]);
    }

    public function edit(Request $request, $game_id){
        $rules = [
            'game_name' => 'required',
            'price' => 'required|gte:10000',
            'description' => 'required|min:10',
        ];

        $validation = Validator::make($request->all(), $rules);

        if($validation->fails()) {
            return back()->withErrors($validation);
        }

        $imageFile = $request->file('image');

        $imageName = null;
        $imageUrl = null;

        if($imageFile){
            $imageName = time().'.'.$imageFile->getClientOriginalExtension();
            $imageUrl = 'images/'.$imageName;
            Storage::putFileAs('public/images', $imageFile, $imageName);
        }

        $game = Game::find($game_id);
        $game->game_name = $request->game_name;
        $game->price = $request->price;
        $game->description = $request->description;

        if($imageFile){
            $game->image_url = $imageUrl;
        }

        $game->save();
        return redirect()->route('gamePage');
    }

    public function addGame(Request $request){
        $rules = [
            'game_name' => 'required',
            'price' => 'required|gte:10000',
            'description' => 'required|min:10',
            'image' => 'required'
        ];

        $validation = Validator::make($request->all(), $rules);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $imageFile = $request->file('image');

        $imageName = time().'.'.$imageFile->getClientOriginalExtension();

        Storage::putFileAs('public/images', $imageFile, $imageName);

        $imageUrl = 'images/'.$imageName;

        $data = [
            'image_url' => $imageUrl,
            'game_name' => $request->game_name,
            'price' => $request->price,
            'description' => $request->description,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        DB::table('games')->insert($data);

        return redirect()->route('gamePage');
    }

    public function delete($game_id){
        $game = Game::find($game_id);
        Game::destroy($game_id);
        return redirect()->route('gamePage');
    }

    public function search(Request $request){
        $search = $request->search;

        $games = Game::where('game_name', 'like', '%'.$search.'%')->paginate(5);

        return view('admin.gamePage', [
            'games' => $games
        ]);
    }
}
