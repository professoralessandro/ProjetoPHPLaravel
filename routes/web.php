<?php

Route::resource('/painel/produtos', 'Painel\ProdutoController');

Route::get('/produtos/testes', 'Painel\ProdutoController@tests');

Route::get('/', 'Site\SiteController@index');

Route::get('/contato', 'Site\SiteController@contato');

//GTUPO COM MIDDLEWARE AUTH
Route::Group(['namespace' => 'Site', 'middleware' => 'auth'], function()
{
    Route::get('/categoria/{id}', 'SiteController@categoria');

    Route::get('/categoria2/{id?}', 'SiteController@categoriaOp');
});



