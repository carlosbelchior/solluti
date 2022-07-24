<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = ['nome', 'valor', 'loja_id', 'ativo'];
    protected $hidden = ['created_at', 'updated_at'];
}
