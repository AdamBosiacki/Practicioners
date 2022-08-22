<?php

namespace App\Http\Controllers;

use App\Http\Middleware\User;
use App\Models\Practicioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth","admin"]);
    }
    public function test(){
        return response()->json(['status'=>'ok']);
    }
    public function Moderators(){

        return view('Moderators');
    }
    public function fetchAllModerators(){
        $moderators = \App\Models\User::all()->where("role","like","m");
        $output = '';
        if ($moderators->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($moderators as $emp) {$output .= '<tr>

                <td>' . $emp->name . '</td>
                <td>' . $emp->surname . '</td>
                <td>' . $emp->email . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editPracticionerModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }
    public function edit(Request $request) {
        $id = $request->id;
        $emp = \App\Models\User::find($id);
        return response()->json($emp);
    }
    public function delete(Request $request) {
        $id = $request->id;
        $emp = \App\Models\User::find($id);
        \App\Models\User::destroy($id);
    }
    public function store(Request $request) {
        if($request['haslo'] != $request['haslo2']){
            return response()->json([
                'status' => 409
            ]);
        }
        DB::insert("insert into users (name,surname,email,password,role) values (?,?,?,?,'m')",[$request->name,$request->surname,$request->email,Hash::make($request['haslo'])]);
        return response()->json([
            'status' => 200
        ]);

    }
    public function update(Request $request) {
        DB::table("users")->where('id','=',$request->id)->update(['name'=>$request->first_name,'surname'=>$request->last_name,'email'=>$request->email]);
        return response()->json([
            'status' => 200,
        ]);
    }
}
