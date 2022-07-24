<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    use HasFactory;
    protected $table = 'lojas';
    protected $fillable = ['nome', 'email'];
    protected $hidden = ['created_at', 'updated_at'];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'loja_id', 'id');
    }
}
