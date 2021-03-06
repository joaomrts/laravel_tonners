@extends('layouts.main')

@section('title', 'Editar Manutenção')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="{{ $url }}" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Edite a Manutenção</h1>
        <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
            <div class="alert alert-danger col-sm-12 col-md-3 col-lg-3" role="alert">
                <p><strong>{{ $error }}</strong></p>
            </div>
            @endforeach
        </ul>
    @endif
    <form action="/editManutencao/update/{{ $manutencao->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="responsavel">Responsavel*</label>
            <input type="text" class="form-control" name="responsavel" id="responsavel" placeholder="Responsavel pela manutenção..." value="{{ $manutencao->responsavel }}">
        </div>
        <div class="form-group">
            <label for="data">Data*</label>
            <input type="date" class="form-control" name="data" id="data" placeholder="Data..." value="{{ $manutencao->data }}">
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
            <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição da manutenção..." value="{{ $manutencao->descricao }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor*</label>
            <input type="number" step=".01" name="valor" id="valor" class="form-control" placeholder="Valor da manutenção..." value="{{ $manutencao->valor }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Manutenção">
        <a href="{{ $url }}" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
