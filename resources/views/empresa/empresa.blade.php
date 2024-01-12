@extends('layouts.app')
@section('title') {{'Lista de empresas'}} @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Lista de empresas') }}
                    <a href="{{ url("trash-empresa") }}" class="btn btn-danger" style="margin-left: 500px;"><i class="fa-solid fa-dumpster"></i>&nbsp;Lixeira</a>
                    <a href="{{ url("add-empresa") }}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Cadastrar</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('search-empresa') }}" method="GET" class="form-inline">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Pesquisar nome da empresa">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-magnifying-glass"></i></i>&nbsp;Filtrar</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th> Nome </th>
                            <th> CNPJ </th>
                            <th> Ações </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($empresa as $e)
                            <tr>
                              <td> {{ $e->nome_fantasia }} </td>
                              <td> {{ $e->cnpj_empresa }} </td>
                              <td>
                                <form method="POST" action="{{ url("delete-empresa/$e->id") }}">
                                  <a href="{{ url("update-empresa/$e->id") }}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Atualizar</a>
                                  @csrf @method('DELETE')
                                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;{{ __('Deletar') }} </button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    {{ $empresa->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
