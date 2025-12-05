<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAddress extends Model
{
    use HasFactory;

    public $timestamps = false;
    const CREATED_AT = 'created_at';

    protected $table = 'user_address';

    protected $fillable = [
        'user_id',
        'address_id'
    ];

    protected $attributes = [
        'ind_excluido' => false
    ];

    protected $casts = [
        'ind_excluido' => 'boolean',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime'
    ];

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function scopeAtivos($query)
    {
        return $query->where('ind_excluido', false);
    }
}
