<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidateRequestData;
use App\Models\{
    User,
    Phone,
    Address
};
class RegisteredUserController extends Controller
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

    public function create()
    {
        return view('users.register');
    }

    public function store(ValidateRequestData $request)
    {
        $user = $this->user->store($request);
        $this->address->store($request, $user);
        $this->phone->store($request, $user);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('login.index')->with('success', 'Cadastro realizado com sucesso');
    }
}
