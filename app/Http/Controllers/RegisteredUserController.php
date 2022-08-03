<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Phone;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;

class RegisteredUserController extends Controller
{
    private $user;
    private $phone;
    private $address;

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'birthday'  => ['required', 'date',],
            'cpf'   => ['required', 'string'],
        ]);

        $data = $request->all();
        $data['password']  = Hash::make($request->password);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'birthday'  => $request->birthday,
            'cpf'       => $request->cpf
        ]);

        $data['user_id']    = $user->id;

        $this->phone->create($data);
        $this->address->create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
