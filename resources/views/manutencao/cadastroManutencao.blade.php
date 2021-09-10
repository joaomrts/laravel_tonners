@extends('layouts.main')

@section('title', 'Cadastrar Manutencao')

@section('content')


<div id="events-create-container" class="col-md-8 offset-md-2 col-sm-10">
    <br>
    <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon>Voltar</a>
    <h1>Cadastre a Manutenção</h1>
        <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/cadastroManutencao/salvar" method="POST">
        @csrf
        <div class="form-group">
            <input type="hidden" class="form-control" name="equipamento_id" id="equipamento_id" value="{{ $equipamento->id }}">
        </div>
        <div class="form-group">
            <label for="responsavel">Responsável*</label>
            <input type="text" class="form-control" name="responsavel" id="responsavel" placeholder="Nome do responsável..." value="{{ old('responsavel') }}">
        </div>
        <div class="form-group">
            <label for="data">Data*</label>
            <br>
            <input type="date" class="form-control" name="data" id="data" class="data">
        </div>
        <div class="form-group">
            <label for="title">Tipo*</label>
          <select name="tipo" id="tipo" class="form-control">
              <option value="Preventiva">Preventiva</option>
              <option value="Corretiva">Corretiva</option>
          </select>
        </div>
        <div class="form-group">
            <label for="title">Serviço*</label>
          <select name="servico" id="servico" class="form-control">
              <option value="Formatação">Formatação</option>
              <option value="Limpeza de Hardware">Limpeza de Hardware</option>
              <option value="Troca de Hardware - Defeito">Troca de Hardware - Defeito</option>
              <option value="Atualização de Hardware">Atualização de Hardware</option>
              <option value="Instalação de Programas">Instalação de Programas</option>
              <option value="Limpeza do Sistema Operacional">Limpeza do Sistema Operacional</option>
          </select>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição*</label>
            <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição da manutenção..." value="{{ old('descricao') }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Cadastrar Manutenção">
        <a href="/" class="btn btn-danger">Cancelar</a>
    </form>
</div>


<div id="events-create-container" class="col-md-10 offset-md-1 col-sm-10">
    <hr>
    <h1>Manutenções já feitas neste equipamento</h1>
    @if ((count($manutencaos) > 0))
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
    <table class="table table-striped table table-bordered">
    <br>
        <thead>
            <tr>
                <th scope="col">Responsável</th>
                <th scope="col">Data</th>
                <th scope="col">Tipo</th>
                <th scope="col">Serviço</th>
                <th scope="col">Descrição</th>
                <th class="açoes-manutencao" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($manutencaos as $manutencao)
            <tr>
                <td class="tabela-manutencao-responsavel" scropt="row">{{ $manutencao->responsavel }}</td>
                <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($manutencao->data)->format('d/m/Y')}}</td>
                <td class="tabela-manutencao-tipo" scropt="row">{{ $manutencao->tipo }}</td>
                <td class="tabela-manutencao-servico" scropt="row">{{ $manutencao->servico }}</td>
                <td class="tabela-manutencao-descricao" scropt="row">{{ $manutencao->descricao }}</td>
                <td>
                <a href="/editManutencao/{{ $manutencao->id }}" style="margin-left: 3px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteManutencao/{{ $manutencao->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <div class="d-flex justify-content-center">
            {{ $manutencaos->appends($filters)->links() }}
        </div>
    @elseif (count($manutencaos) == 0 && $filters)
        <div class="col-sm-8 col-md-8 offset-md-2">
            <h5><br>Não foi possível retornar resultados com sua busca.
        </div>
    @elseif (count($manutencaos)== 0)
        <div class="col-sm-8 col-md-8 offset-md-2">
        <br>
            <h5 style="text-align: center">Não há manutenções cadastradas...
        </div>
    @endif
    </div>
</div>

@endsection
