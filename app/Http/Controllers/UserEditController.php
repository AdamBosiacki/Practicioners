<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use Illuminate\Support\Facades\Hash;

class UserEditController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth"]);
    }

    public function index(){
        return view('UserEdit');
    }

    public function profileUpdate(Request $request){

        $request -> validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email'
        ]);
        $user = Auth::user();
        $user -> name = $request['name'];
        $user -> surname = $request['surname'];
        $user -> email = $request['email'];
        if(($request['haslo']) != "" && $request["haslo"] == $request["haslo2"]){
            $user -> password  = Hash::make($request["haslo"]);
        }
        if($request["haslo"] != $request["haslo2"]){
            return back()->with('error', 'Hasła nie są zgodne');
        }
        $user -> save();
        return back()->with('message', 'Profile Updated');
    }
}
