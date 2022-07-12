<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    user,
    Phone,
    Address
};

class UserController extends Controller
{
    // protected $user;
    // protected $phone;
    // protected $address;

    // public function __construct(User $user, Phone $phone, Address $address)
    // {
    //     $this->user = $user;
    //     $this->phone = $phone;
    //     $this->address = $address;
    // }

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('account.index')->with('message', 'Acesso realizado com sucesso');
        }else{
            return view('users.login');
        }

    }

    public function auth(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return view('users.auth');
        }else{
            dd('não logou');
        }
    }

    public function create()
    {

        return view('users.register');

    }

    public function store(request $request){

        $user = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = password_hash($request->password, PASSWORD_ARGON2I);
        $user->birthday = $request->birthday;
        $user->cpf      = $request->cpf;
        $user->save();

        $address    = new Address;
        $address->address   = $request->address;
        $address->district  = $request->district;
        $address->zip_code  = $request->zipcode;
        $address->city      = $request->city;
        $address->state     = $request->state;
        $address->country   = $request->country;
        $address->user_id   = $user->id;
        $address->save();

        $phone      = new phone;
        $phone->phone       = $request->phone;
        $phone->description = $request->description;
        $phone->user_id     = $user->id;
        $phone->save();

        $message = "Usuario registrado com sucesso.";

        return view('users.register', compact('message'));

    }

    public function show(){

        $arrUsers = [
            'users' => user::all(), 
            'phones' => phone::all(),
            'addresses' => address::all()
        ];

        return view('admin.account', compact('arrUsers'));
    }

}
