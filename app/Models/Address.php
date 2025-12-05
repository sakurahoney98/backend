<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
       'cep',
       'logradouro'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_address', 'address_id', 'user_id')
                    ->withPivot('ind_excluido', 'deleted_at', 'created_at')
                    ->wherePivot('ind_excluido', false);
    }
}
