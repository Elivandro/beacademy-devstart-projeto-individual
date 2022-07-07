<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'address',
        'district',
        'zip_code',
        'city',
        'state',
        'country',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function User()
    {

        return $this->belongsTo(User::class);

    }


}
