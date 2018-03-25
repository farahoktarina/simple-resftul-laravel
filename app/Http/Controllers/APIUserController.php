<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class APIUserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json(['data'=>$users]);
    }

    public function store(Request $request){
        try{
          $user = User::create($request->all());
          return response()->json(['sukses'=>true]);
        }catch(\Exception $e){
          return response()->json(['sukses'=>false,'eror'=>'eror'.$e]);
        }
    }

    public function update(Request $request, $id){
        try{
          $user = User::find($id);
          $data['name'] = $request->name;
          $data['emal'] = $request->email;
          $data['password'] = bcrypt($request->password);
          $user->update($data);
          return response()->json(['sukses'=>true]);
        }catch(\Exception $e){
          return response()->json(['sukses'=>false,'eror'=>'eror'.$e]);
        }
    }

    public function delete($id){
        try{
          $user = User::find($id);
          $user->delete();
          return response()->json(['sukses'=>true]);
        }catch(\Exception $e){
          return response()->json(['sukses'=>false,'eror'=>'eror'.$e]);
        }
    }
}
