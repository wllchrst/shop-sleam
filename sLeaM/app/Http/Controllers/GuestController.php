<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller {

    public function unauthorized (){
        return view('unauthorizedPage');
    }
    public function registerPage(){
        return view('landingPage.register', ['name' => 'Register']);
    }

    public function loginPage(){
        return view('landingPage.login', ['name' => 'Login']);
    }

    public function register(Request $request){
        $rules = [
            'image' => 'required|mimes:jpg,png,jpeg',
            'username' => 'required|min:5|max:20',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:5'
        ];

        $validation = Validator::make($request->all(), $rules);

        if($validation->fails()) {
            return back()->withErrors($validation);
        }


        // ! saving file
        $imageFile = $request->file('image');
        $imageName = time().'.'.$imageFile->getClientOriginalExtension();

        Storage::putFileAs('public/images', $imageFile, $imageName);

        $image_url = 'images/'.$imageName;

        $data = [
            'image_url' => $image_url,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'is_admin' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        DB::table('users')->insert($data);

        return redirect()->route('loginPage');
    }

    public function login (Request $request){

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $validation = Validator::make($request->all(), $rules);
        
        if($validation->fails()) {
            return back()->withInput($request->input())->withErrors($validation);
        }

        $credentials= [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->is_admin) {
                return redirect()->route('gamePage');
            }
            else {
                return redirect()->route('dashboard');
            }
        }
        else {
            return back()->withErrors([
                'error' => 'Wrong credentials'
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
