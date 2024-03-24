<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller {    
    public function profilePage (){
        $user = Auth::user();
        return view('member.profilePage', [
            'user' => $user
        ]);
    }

    public function dashboardPage(){
        $user = Auth::user();
        return view('member.dashboard', [
            'user' => $user,
            'games' => DB::table('games')->latest()->take(6)->get()
        ]);
    }

    public function getOwnedGames($user_id){
        $user = Auth::user(); // user sekarang
        $details = Transaction::where('user_id', '=', $user->user_id)->get();
        // details
        $games = array() ;
        $i = 0;
        foreach($details as $detail){
            $game = Game::find($detail->game_id);
            $games[$game->game_id] = $game;
        }
        return $games;
    }

    public function gamePage(){
        $user = Auth::user(); 
        $ownedGames = MemberController::getOwnedGames($user->user_id);
        return view('member.gamePage', [
            'user' => $user,
            'games' => Game::paginate(5),
            'ownedGames' => $ownedGames
        ]);
    }

    public function buyGame($game_id){
        $user = Auth::user();

        $newTransaction = [
            'user_id' => $user->user_id,
            'game_id' => $game_id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];


        Transaction::create($newTransaction);
        return redirect()->route('memberGamePage');
    }

    public function libraryPage(){
        $user = Auth::user();
        $games = MemberController::getOwnedGames($user->user_id);

        return view('member.library', [
            'user' => $user,
            'games' => $games
        ]);
    }

    public function gameDetailPage($game_id){
        $game = Game::find($game_id);
        $user = Auth::user();
        $ownedGames = MemberController::getOwnedGames($user->user_id);

        return view('member.game_detail', [
            'user' => $user,
            'game' => $game,
            'ownedGames' => $ownedGames
        ]);
    }

    public function search(Request $request){
        $user = Auth::user();
        $games = Game::where('game_name', 'like', '%'.$request->search.'%')->get();
        return view('member.dashboard', [
            'user' => $user,
            'games' => $games
        ]);

    }

    public function editProfilePage(){
        $user = Auth::user();
        return view('member.editProfilePage', [
            'user' => $user,
        ]);
    }

    public function editProfile (Request $request){
        $rules = [
            'image' => 'required|mimes:jpg,png,jpeg',
            'username' => 'required|min:5'
        ];

        $validation = Validator::make($request->all(), $rules);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $imageFile = $request->file('image');

        $imageName = time().'.'.$imageFile->getClientOriginalExtension();

        Storage::putFileAs('public/images', $imageFile, $imageName);

        $imageUrl = 'images/'.$imageName;

        $userfinder = Auth::user();

        $user = User::find($userfinder->user_id);

        $user->username = $request->username;
        $user->image_url = $imageUrl;

        $user->save();

        return redirect()->route('profilePage');

    }
}
