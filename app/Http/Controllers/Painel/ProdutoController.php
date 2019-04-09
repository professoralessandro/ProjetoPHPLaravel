<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product; //ESTA LINHA USA UM OBJETO CHAMADO PRODUTO
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{
    //ATRIBUTOS
    private $product;
    private $totalPage = 3;

    //CONSTRUTOR
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    //METODO INDEX
    public function index()
    {
        $title = 'Home produtos';
        
        $products = $this->product->paginate($this->totalPage);
        
        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastrar de produto";
        
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        
        return view('painel.products.create-edit', compact('categorys', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        /*
        dd($request->all());//PEGA TODOS OS CAMPOS
        
        dd($request->only(['name', 'number']));//PEGA ESTES CAMPOS DENTRO DO ARRAY
        
        dd($request->except(['token', 'category']));//PEGA TODOS OS CAMPOS EXCETO CAMPOS DENTRO DO ARRAY
        
        dd($request->input('name'));//PEGA CAMPO NOME
        */
        /* CASO ALGUM CAMPO ESTEJA VAZIO COMO O ACTIVE
        if(!isset($dataForm['active']))
        {
            $dataForm['active'] = 0;
        }
        else
        {
            $dataForm['active'] = 1;
        }
         */
        
        $dataForm = $request->except('_token');
        
        /* MENSAGENS PERSONALIZADAS ANT, MUDOU PARA A CLASSE PRODUCTFORMREQUEST
        $messages = [
            
            'name.required'     => 'O campo nome é obrigatório!',
            'number.numeric'    => 'O campo número só aceita caracteres numéricos!',
            'number.required'   => 'o campo número é de preenchimento obrigatório!',
        ];
        */
        
        //METODO ANTERIOR DE GRAVAR NO BANCO COM RETORNO DE MENSAGEM
        //$this->validate($request, $this->product->rules); UM JEITO DE FAZER
        /*
        $validate = validator($dataForm, $this->product->rules, $messages);
        
        
        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        */
        //METODO ANTERIOR DE GRAVAR NO BANCO COM RETORNO DE MENSAGEM
        
        $insert = $this->product->create($dataForm);
        
        if($insert)
        {
            //return redirect('/painel/produtos') ESTA LINHA JA RESOLVERIA
            return redirect()->route('produtos.index'); //MELHOR JEITO DE FAZER
        }
        else
        {
            //return redirect()->route('produtos.create'); OUTRO JEITO
            return redirect()->back(); //RETORNA PARA ONDE VEIO
        }
        
        
    }//STORE

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);
        
        $title = "Deletar produto: {$product->name}";
        
        return view('painel.products.show', compact('product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        
        $title = "Editar produto: {$product->name}";
        
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        
        return view('painel.products.create-edit', compact('categorys', 'title', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        //RECUPERA TODOS OS DADOS DO FORMULARIO
        $dataForm = $request->all();
        
        //RECUPERA O PRODUTO QUE EU QUERO EDITAR
        $product = $this->product->find($id);
        
        //EDITA O PRODUTO JÁ COM A VERIFICAÇÃO DEITA PELO PRODUCTDATACORMREQUEST
        $update = $product->update($dataForm);
        
        if($update)
        {
            return redirect()->route('produtos.index');
        }
        else
        {
            return redirect()->route('produtos.edit', $id)->with(['errors' => 'falha ao editar!']);
        }
    }//UPDATE

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        
        $delete = $product->delete();
                
        if($delete)
        {
            return redirect()->route('produtos.index');
        }
        else
        {
            return redirect()->route('produtos.show', $id)->with(['errors' => 'falha ao deletar!']);
        }
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
        //$delete = $this->product->where('number', 123456)->delete(); //DELETA PRODUTO 2
        
        $delete = $this->product->destroy(2); //DELETA PRODUTO 2
        
        if ($delete) {
            return "Produto deletado com sucesso";
        } else {
            return 'erro ao deletar o produto';
        }
        
        //$prod = $this->product->destroy([1,2,3]); //DELETA ARRAY DE PRODUTOS
        
    }//TESTS
}
