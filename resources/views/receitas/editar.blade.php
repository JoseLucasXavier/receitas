@extends('layouts.admin')

@section('main-content')

    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} border-left-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Page Heading -->
    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editar Receita</h6>
                </div>
                <div class="card-body">	
                    <h4>Identificação:</h4>
                    <hr/></hr>
                    {{ Form::model($receita, ['route' => ['receitas.atualizar', $receita->id], 'method' => 'PUT', 'files' => true, 'enctype' => 'multipart/form-data']) }}
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="categoria_id">Categoria *</label>
                                <select name="categoria_id" class="form-control" required>
                                    <option value="" selected>Selecione...</option>
                                    @foreach($categorias as $categoria)
                                        @if($receita->categoria_id == $categoria->id)
                                            <option value="{{ $categoria->id }}" selected>{{ $categoria->nome }}</option>
                                        @else
                                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                        @endif
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
                                {{ Form::textarea('descricao', 'old'('descricao'), ['class' => 'form-control', 'rows' => 2, 'style' => 'resize:none', 'autofocus']) }}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                {{ Form::label('ingredientes', 'Ingredientes *') }}
                                {{ Form::textarea('ingredientes', 'old'('ingredientes'), ['class' => 'form-control', 'rows' => 8, 'style' => 'resize:none', 'autofocus']) }}
                            </div>
                            <div class="form-group col-md-7">
                                {{ Form::label('modo_preparo', 'Modo de Preparo *') }}
                                {{ Form::textarea('modo_preparo', 'old'('modo_preparo'), ['class' => 'form-control', 'rows' => 8, 'style' => 'resize:none', 'autofocus']) }}
                            </div>
                        </div>
                        {{ Form::submit('Salvar', ['class' => 'btn btn-success btn-block']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
<script>
    function mascara(i,t){
    
        var v = i.value;
        
        if(isNaN(v[v.length-1])){
            i.value = v.substring(0, v.length-1);
            return;
        }

        if(t === "tel"){
            if (v.length === 1) i.value = "(" + i.value;
            if (v.length === 3) i.value += ") ";
            if(v[5] == 9){
                i.setAttribute("maxlength", "15");
                if (v.length === 10) i.value += "-";
            }else{
                i.setAttribute("maxlength", "14");
                if (v.length === 9) i.value += "-";
            }
        }
    }
</script>
@endsection