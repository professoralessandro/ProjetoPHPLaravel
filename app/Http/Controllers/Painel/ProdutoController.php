<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product; //ESTA LINHA USA UM OBJETO CHAMADO PRODUTO

class ProdutoController extends Controller
{
    //ATRIBUTOS
    private $product;

    //CONSTRUTOR
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    //METODO INDEX
    public function index()
    {
        $products = $this->product->all();
        
        return view('painel.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //a
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tests()
    {
        //return 'METODO TESTS';
        //INSERIR
        /*
          $insert = $this->product->insert([
          'name' => 'Nome do produto 2',
          'number' => 123456,
          'active' => false,
          'category' => 'eletronicos',
          'description' => 'Descrição vem aqui',
          ]);

          if ($insert)
          {
          return "Produto inseridoc om sucesso";
          }
          else
          {
          return 'erro ao inserir o produto';
          }
         */
        //INSERIR
        //dd($prod);
        //
        //UPDATE
        /*
        $prod = $this->product->where('number', 123456)->update([
            'name' => 'Update Teste',
            'number' => 123111231,
            'active' => true,
        ]);
        
        $prod = $this->product->find(2);

        $update = $prod->update([
            'name' => 'Update Teste',
            'number' => 123111231,
            'active' => true,
        ]);
        if ($update) {
            return "Produto alterado com sucesso";
        } else {
            return 'erro ao alterar o produto';
        }
        //UPDATE
         * 
         */
        
        //DELETE
        $delete = $this->product->where('number', 123456)->delete(); //DELETA PRODUTO 2
        
        $delete = $this->product->destroy(2); //DELETA PRODUTO 2
        
        if ($delete) {
            return "Produto deletado com sucesso";
        } else {
            return 'erro ao deletar o produto';
        }
        
        //$prod = $this->product->destroy([1,2,3]); //DELETA ARRAY DE PRODUTOS
        
    }//TESTS
}
