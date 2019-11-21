<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function detail(Request $request) {
        $id = $request->id;
        $user = User::where('id', '=', $id)->first();
        if ($user == null)
            return view('user', ['found' => false]);
        return view('user', ['found' => true, 'id' => $id, 'password' => $user->password, 'comment' => json_decode($user->comment)]);
    }

    public function addComment(Request $request) {
        $param_id       = $request->id;
        $param_password = $request->password;
        $param_comment  = $request->comment;

        if($param_id == "") {
            $data = $request->json()->all();
            $param_id = $data['id'];
            $param_password = $data['password'];
            $param_comment  = $data['comment'];
        }
        $user = User::where([
            ['id', '=', $param_id],
            ['password', '=', $param_password]
        ])->first();
        
        if ($user == null)
            return response()->json([
                "result" => "failure",
                "id"     => $param_id,
                "password" => $param_password,
            ]);

        $comment = json_decode($user->comment);
        array_push($comment, $param_comment);
        DB::table('users')
            ->where('id', $param_id)
            ->update(['comment' => json_encode($comment)]);
        return response()->json([
                "result" => "success",
            ]);
    }
}
