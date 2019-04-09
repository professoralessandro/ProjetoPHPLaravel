<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'number', 'active', 'category', 'description']; //ESTE CAMPO DETERMINA QUAIS CAMPOS PODEM SER PREENCHIDOS PELO USUARIO NA AO GRAVAR UM DADO OU ALTERAR
    
    //protected $guarded =['admin'];
}//CLASS