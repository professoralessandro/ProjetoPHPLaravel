<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {        
        return view('site.home.index');
    }
    
    public function contato()
    {
        return view('site.contato.index');
    }
    
    public function categoria($id)
    {
        return "o ID da categoria é: {$id}";
    }
    
    public function categoriaOp($id = 5)
    {
        return "o ID da categoria é: {$id}";
    }
    
}//CLASS
