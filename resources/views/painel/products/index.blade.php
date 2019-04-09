@extends('painel.templates.template')

@section('content')
<div class="jumbotron">
    <!-- INICIO SLIDES -->
    <div class="container">
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <hr>
                        <h1>LISTAGEM DE PRODUTOS</h1>
                        <hr>
                        <br>
                        <td><a class='btn btn-success' href="{{route('produtos.create')}}"><img src={{url('assets/images/cadastrar-itens-black.png')}} width="20" height="20" /> Cadastrar</a></td>
                        <br>
                        <br>
                        <table class="table table-striped">
                            <tr>
                                <th>nome</th>
                                <th>descrição</th>
                                <th width=260'></th>
                            </tr>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td><a class='btn btn-primary' href="{{route('produtos.edit', $product->id)}}"><img src={{url('assets/images/alterar-itens-black.png')}} width="20" height="20" /> Alterar</a>
                                <a class='btn btn-secondary' href="{{route('produtos.show', $product->id)}}"><img src={{url('assets/images/eye.png')}} width="20" height="20" /> Visualizar</a></td>
                            </tr>
                            @endforeach
                        </table>
                        <table>
                            <tr>
                                <td class="container-" align='center'>{!! $products->links() !!}</td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../js/jquery-3.2.1.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../js/popper.min.js"></script> 
<script src="../js/bootstrap-4.0.0.js"></script>
@endpush