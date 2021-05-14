<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data['image']);
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'image' => ['mimes:jpeg,jpg,JPG,bmp,png'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function savePhoto(Request $request)
    {
        $image = $request->file('image');
        $image_path = time() . $image->getClientOriginalName();
        \Storage::disk('photos_porfile')->put($image_path, \File::get($image));
    }

    protected function create(array $data)
    {
 
        if (isset($data['image']) && !empty($data['image'])) {
            $request = request();
            $image = $request->file('image');
            $image_path = time() . '-porfile-' . $image->getClientOriginalName();
            \Storage::disk('photos_porfile')->put($image_path, \File::get($image));
            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['lastname'],
                'email' => $data['email'],
                'profile_photo' => $image_path,
                'password' => Hash::make($data['password']),
            ]);
        } else {
            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['lastname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }
}
