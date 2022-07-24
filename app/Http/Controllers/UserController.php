<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRequestData;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    user,
    Phone,
    Address
};
use Illuminate\Http\Request;

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
            return redirect()->route('account.index');
        }else{
            return view('users.login');
        }

    }

    public function create()
    {

        return view('users.register');

    }

    public function store(ValidateRequestData $request){

        $user = $this->user->store($request);
        $this->address->store($request, $user);
        $this->phone->store($request, $user);

        return redirect()->route('login.index')->with('success', 'Cadastro realizado com sucesso');

    }

}
