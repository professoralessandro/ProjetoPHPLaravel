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
                    <h1>EDIÇÃO DO PRODUTO: {!! strtoupper($product->name) !!}</h1>
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
                    {!! Form::model($product, ['route' => ['produtos.update', $product->id], 'class', 'form', 'method' => 'put'])!!}
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nome:']) !!}
                        </div>
                        <div class="form-group" class="form-control">
                            <label>
                                <input type="checkbox" class="form-control" name="active" value="1" @if(isset($product)&& $product->active == '1') checked @endif)>Ativo?
                            </label>
                        </div>
                        <div class="form-group">
                            {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'número:']) !!}
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
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição:']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Alterar', ['class' => 'btn btn-block btn-lg btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
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
                    {!! Form::open(['route' => 'produtos.store', 'class' => 'form']) !!}
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nome:']) !!}
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="form-control" name="active" value="1">
                                <!-- CHECK BOX COLLECTIVE  {!! Form::checkbox('active', null, ['class' => 'form-control']) !!} -->
                                Ativo?
                            </label>
                        </div>
                        <div class="form-group">
                            {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'número:']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::select('category', $categorys, null, ['class' => 'form-control']) !!} 
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição:']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Cadastrar', ['class' => 'btn btn-block btn-lg btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
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