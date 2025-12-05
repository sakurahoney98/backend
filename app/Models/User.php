<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'ide_perfil',
    ];

    protected $attributes = [
        'ind_excluido' => false
    ];

    protected $casts = [
        'ind_excluido' => 'boolean',
        'deleted_at' => 'datetime'
    ];

    public function perfil()
    {
        return $this->belongsTo(Profile::class, 'ide_perfil');
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'user_address', 'user_id', 'address_id')
                ->withPivot('ind_excluido', 'deleted_at', 'created_at') // ← ADICIONAR ESTA LINHA
                ->wherePivot('ind_excluido', false);
    }

    public function scopeAtivos($query)
    {
        return $query->where('ind_excluido', false);
    }


}
