<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $user;
    protected $address;
    protected $phone;

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

    public function regaddress()
    {
        return view('dashboard.address');
    }

    public function regphone()
    {
        return view('dashboard.phone');
    }

    public function editaddress($id)
    {
        if(!$address = $this->address->find($id)){
            return view('dashboard.account');
        }

        return view('dashboard.editaddress', compact("address"));
    }

    public function editphone($id)
    {
        if(!$phone = $this->phone->find($id)){
            return view('dashboard.account');
        }

        return view('dashboard.editphone', compact("phone"));
    }

    public function storeaddress(request $request, $id)
    {
        $data = $request->all();
        $data['user_id']    = $id;

        $this->address->create($data);

        return redirect()->route("account.index")->with('create', "Novo endereço cadastrado com sucesso!");

    }

    public function storephone(request $request, $id)
    {
        $data = $request->all();
        $data['user_id']    = $id;

        $this->phone->create($data);

        return redirect()->route("account.index")->with('create', "Novo telefone cadastrado com sucesso!");
    }

    public function updatephone(request $request, $id)
    {
        if(!$phone = $this->phone->find($id)){

            return redirect()->route("account.index");

        }
        $data = $request->all();

        $phone->update($data);

        return redirect()->route("account.index")->with('edit', "Telefone atualizado com sucesso!");

    }

    public function updateaddress(request $request, $id)
    {
        if(!$address = $this->address->find($id)){

            return redirect()->route("account.index");

        }
        $data = $request->all();

        $address->update($data);

        return redirect()->route("account.index")->with('edit', "Endereço atualizado com sucesso!");

    }

    public function addressdestroy($id)
    {
        if($address = $this->address->find($id)){

            $address->delete();
            return redirect()->route("account.index")->with('destroy', "Endereço deletado com sucesso!");

        }else{

            return redirect()->route("account.index");

        }
        
    }  
    
    public function phonedestroy($id)
    {
        if($phone = $this->phone->find($id)){

            $phone->delete();
            return redirect()->route("account.index")->with('destroy', "Telefone deletado com sucesso!");

        }else{

            return redirect()->route("account.index");

        }

    }

}
