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
    protected $user;
    protected $phone;
    protected $address;

    public function __construct(User $user, Phone $phone, Address $address)
    {
        $this->user = $user;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('account.index')->with('message', 'Acesso realizado com sucesso');
        }else{
            return view('users.login');
        }

    }

    public function create()
    {

        return view('users.register');

    }

    public function store(request $request){

        $user = $this->user->store($request);
        $this->address->store($request, $user);
        $this->phone->store($request, $user);

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
