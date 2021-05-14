<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserUpdateRequest;


class UserController extends Controller
{
    //

    public function edit()
    {
        $id = \Auth::user()->id;
        $user = User::where('id', '=', $id)->first();
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(UserUpdateRequest $request,$user)
    {
        
        $usuario = User::where('id', '=', $user)->first();
        $usuario->first_name = $request->input('first_name');
        $usuario->last_name = $request->input('lastname');
        $usuario->email = $request->input('email');
        
        $image = $request->file('image');
        if($image){
            $image_path = time() . '-porfile-' . $image->getClientOriginalName();
            \Storage::disk('photos_porfile')->put($image_path, \File::get($image));
            \Storage::disk('photos_porfile')->delete($usuario->profile_photo);
            $usuario->profile_photo = $image_path;
        }
        $usuario->update();

        return redirect()->route('home')->with('info','Perfil Actualizado Correctamente!!');
    }
}
