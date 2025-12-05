<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{

    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'des_perfil'
    ];

    protected $attributes = [
        'ind_excluido' => false
    ];

    protected $casts = [
        'ind_excluido' => 'boolean',
        'deleted_at' => 'datetime'
    ];


    public function users()
    {
        return $this->hasMany(User::class, 'ide_perfil');
    }

    public function scopeAtivos($query)
    {
        return $query->where('ind_excluido', false);
    }
}
