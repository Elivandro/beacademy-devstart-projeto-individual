<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'password_created_at',
        'birthday',
        'cpf',
        'userType',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Phones()
    {

        return $this->hasMany(Phone::class);

    }

    public function Addresses()
    {

        return $this->hasMany(Address::class);

    }

    public function store($data)
    {
        $user = new User;
        $user->name     = $data->name;
        $user->email    = $data->email;
        $user->password = Hash::make($data->password, PASSWORD_ARGON2I);
        $user->birthday = $data->birthday;
        $user->cpf      = preg_replace('/[^0-9]/', '', $data->cpf);
        $user->save();

        return $user->id;
    }

    public function imageUser($request)
    {
        $user = User::findOrFail($request->id);

        if($request->image){
            $file               = $request['image'];
            $path               = $file->store('assets/profile', 'public');
            $data['image']      = $path;
        }

        if($user->image){
            unlink(public_path('storage/'.$user->image));
        }

        $user->image = $data['image'];
        $user->save();

    }

}
