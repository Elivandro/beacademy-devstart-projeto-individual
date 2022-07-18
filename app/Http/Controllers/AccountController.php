<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct(User $user, Address $address, Phone $phone)
    {

        $this->user = $user;
        $this->address = $address;
        $this->phone = $phone;

    }


    public function index()
    {
        return view('dashboard.account');
    }

    public function destroy($id)
    {
        if($address = $this->address->find($id)){

            $address->delete();
            return redirect()->route("account.index")->with('destroy', "Endereço deletado com sucesso!");

        }else if($phone = $this->phone->find($id)){

            $phone->delete();
            return redirect()->route("account.index")->with('destroy', "Telefone deletado com sucesso!");

        }else{

            return redirect()->route("account.index");

        }

    }

}
