<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;    
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {      
        // $shift = $request->shift;        

        // $data = array(
        //     'shift' => $shift,
        // );

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],            
            'no_reg' => ['required', 'string', 'max:10'],                                     
            'shift' => ['required', 'date_format:Y-m-d\TH:i'],           
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }    
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],            
            'no_reg' => $data['no_reg'],
            'shift' => $data['shift'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
