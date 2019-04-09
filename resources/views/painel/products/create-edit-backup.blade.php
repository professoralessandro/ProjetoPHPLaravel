@extends('painel.templates.template')

@section('content')

<div class="jumbotron">
    <!-- INICIO SLIDES -->
    <div class="container">
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <!-- FORM EDIÇÃO DE PRODUTO -->
                    @if(isset($product))
                    <hr>
                    <h1>EDIÇÃO DO PRODUTO {!! strtoupper($product->name) !!}</h1>
                    <hr>
                    @if(isset($errors) && count($errors) > 0)
                    <div class="alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                        @endforeach
                    </div>
                    @endif
                    <br>
                    <br>
                    <br>
                    <form class="formEditar" method="post" action="{{route('produtos.update', $product->id)}}">
                        {!! method_field('PUT') !!}
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nome:" value="{!!$product->name!!}">
                        </div>
                        <div class="form-group" class="form-control">
                            <label>
                                <input type="checkbox" class="form-control" name="active" value="1" @if(isset($product)&& $product->active == '1') checked @endif)>Ativo?
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="number" placeholder="Número:" value="{!!$product->number!!}">
                        </div>
                        <div class="form-group">
                            <select class="form-control"  name="category">
                                <option class="form-control" value="">Escolha a Categoria</option>
                                @foreach($categorys as $category)
                                <option class="form-control" value="{{$category}}"
                                        @if(isset($product) && $product->category == $category)
                                            selected
                                        @endif
                                        >{{$category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="description" placeholder="Descrição" class="form-control">{!!$product->description!!}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                    <!-- FORM CADASTRO DE PRODUTO -->
                    @else
                    <hr>
                    <h1>CADASTRO DE PRODUTOS</h1>
                    <hr>
                    @if(isset($errors) && count($errors) > 0)
                    <div class="alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                        @endforeach
                    </div>
                    @endif
                    <br>
                    <br>
                    <br>
                    <form class="formCadastrar" method="post" action="{{route('produtos.store')}}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="form-control" name="active" value="1">Ativo?
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="number" placeholder="Número:" value="{{old('number')}}">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="category">
                                <option class="form-control" value="">Escolha a Categoria</option>
                                @foreach($categorys as $category)
                                <option class="form-control" value="{{$category}}">{{$category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="Descrição" value="{{old('description')}}">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                    @endif

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