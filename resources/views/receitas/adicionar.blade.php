@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cadastrar Receita</h6>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'receitas.salvar', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) }}
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="categoria_id">Categoria *</label>
                                <select name="categoria_id" class="form-control" required>
                                    <option value="" selected>Selecione...</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-10">
                                {{ Form::label('titulo', 'Título *') }}
                                {{ Form::text('titulo', 'old'('titulo'), ['class' => 'form-control', 'placeholder' => 'Insira aqui o titulo da Receita', 'required', 'autofocus']) }}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                {{ Form::label('descricao', 'Descrição *') }}
                                {{ Form::textarea('descricao', 'old'('descricao'), ['class' => 'form-control', 'rows' => 2, 'style' => 'resize:none', 'autofocus', 'required']) }}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                {{ Form::label('ingredientes', 'Ingredientes *') }}
                                {{ Form::textarea('ingredientes', 'old'('ingredientes'), ['class' => 'form-control', 'rows' => 8, 'style' => 'resize:none', 'autofocus', 'required']) }}
                            </div>
                            <div class="form-group col-md-7">
                                {{ Form::label('modo_preparo', 'Modo de Preparo *') }}
                                {{ Form::textarea('modo_preparo', 'old'('modo_preparo'), ['class' => 'form-control', 'rows' => 8, 'style' => 'resize:none', 'autofocus', 'required']) }}
                            </div>
                        </div>
                        {{ Form::submit('Salvar', ['class' => 'btn btn-success btn-block']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
