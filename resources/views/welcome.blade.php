@extends('layouts.welcome')


@section('main-content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

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
                    <h6 class="m-0 font-weight-bold text-primary">Listagem de Receitas</h6>
                </div>
                <div class="card-body">
                    <table id="table_id" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10%">Categoria</th>
                                <th style="width:35%">Título</th>
                                <th>Descrição</th>
                                <th style="width:1%">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($receitas ?? '') > 0)
                            @foreach($receitas ?? '' as $receita)
                            <tr>
                                <td>{{ $receita->categoria }}</td>
                                <td>{{ $receita->titulo }}</td>
                                <td>{{ $receita->descricao }}</td>
                                <td>
                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#modalExc{{ $receita->id }}"><i class="fas fa-eye"></i></a>
                                    <div class="modal fade" id="modalExc{{ $receita->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $receita->titulo }} - {{ $receita->categoria }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body">
                                                <strong> Descrição: </strong>{{ $receita->descricao }}
                                                <hr>
                                                <strong> Ingredientes: </strong>{{ $receita->ingredientes }}
                                                <hr>
                                                <strong> Modo de Preparo: </strong>{{ $receita->modo_preparo }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    <div class="alert border-info text-center">
                                        <strong>Nenhuma receita cadastrada...</strong>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script>
        let table_id = new DataTable('#table_id', {
            "language":{
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            }
        });
    </script>
    

@endsection