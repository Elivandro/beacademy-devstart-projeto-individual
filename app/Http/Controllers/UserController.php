<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Phone;
use App\Models\Address;

class UserController extends Controller
{

    public function __construct(User $user, Phone $phone, Address $address)
    {
        $this->model = $user;
        $this->model = $phone;
        $this->model = $address;
    }

    public function index(){

        return view('login');

    }

    public function create(){

        return view('register');

    }

    public function store(request $request){

        $data               = $request->all();

        $data['password']   = password_hash($request->password, PASSWORD_ARGON2I);
        $data['user_id']    = user::id();

        dd($data);

        $this->model->create($data);

        return view('login');

    }

    public function show(){

        $arr = [
            'users' => user::all(), 
            'phones' => phone::all(),
            'addresses' => address::all()
        ];

        return view('admin.show', compact('arr'));
    }

}
