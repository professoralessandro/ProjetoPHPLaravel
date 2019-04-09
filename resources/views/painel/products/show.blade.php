@extends('painel.templates.template')

@section('content')
<div class="jumbotron">
    <!-- INICIO SLIDES -->
    <div class="container">
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <!-- FORM EDIÇÃO DE PRODUTO -->
                    <hr>
                    <h1>DELETAR PRODUTO: {!! strtoupper($product->name) !!}</h1>
                    <hr>
                    @if(isset($errors) && count($errors) > 0)
                    <div class="alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                        @endforeach
                    </div>
                    @endif
                    <p><b>Nome: </b>{{$product->name}}</p>
                    <p><b>Número: </b>{{$product->number}}</p>
                    <p><b>Categoria: </b>{{$product->category}}</p>
                    <p><b>Ativo: </b>{{$product->active}}</p>
                    <p><b>Descrição: </b>{{$product->description}}</p>
                    <br>
                    <br>
                    <br>
                    {!! Form::open(['route' => ['produtos.destroy', $product->id], 'method' => 'DELETE']) !!}
                        <div class="form-group">
                            {!! Form::submit('Deletar', ['class' => 'btn btn-block btn-lg btn-danger']) !!}
                        </div>
                    {!! Form::close() !!}
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
