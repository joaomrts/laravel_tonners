@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')

    @if(count($errors) > 0)
          <div class="alert alert-danger alert-dismissible show" role="alert">
              <strong>Algo deu errado... Preencha seus dados corretamente.</strong>
              <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              @foreach($errors->all() as $error)   
                  <li style="margin-left: 5px">{{ $error }}</li>
              @endforeach
          </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible show" role="alert">
        <strong>Algo deu errado... </strong>{{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(count($bots)>0)
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
    <table class="table table-borderless table-hover table-responsive-lg">
        <div class="dashboard-tinta-container">
            <a href="/Office"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="logo-windows"></ion-icon> Office</a>
            <a href="/Suprimentos"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="color-filter-outline"></ion-icon> Suprimentos</a>
            <a href="/Impressoras" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="print-outline"></ion-icon> Impressoras</a></h5>
        </div>
        <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="home-outline"></ion-icon> Início</a></h5>
        <br>
        <hr>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalBot"><ion-icon name="create-outline"></ion-icon> 
            Cadastrar Bot
        </button>
        <br>
    <br>
        <thead class="table-secondary">
            <tr>
                <th scope="col">Nome do Grupo</th>
                <th scope="col">Bot Id</th>
                <th scope="col">Chat Id</th>
                <th class="açoes-equipamento" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody class="table-light">
            @foreach ($bots as $item)
            <tr>
                <td class="tabela-equipamentos-ip">{{ $item->nome_grupo }}</td>
                <td class="tabela-equipamentos-setor" scropt="row">{{ $item->bot_id }}</td>
                <td class="tabela-equipamentos-equipamento" scropt="row">{{ $item->chat_id }}</td>
                <td>
                <a href="{{ route('bots.edit', $item->id) }}"title="Editar" style="margin-left: 5px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="{{ route('bots.delete', $item->id) }}"method="POST" title="Excluir">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif (count($bots) == 0)
    <div class="col-sm-10 col-md-10 offset-md-1">
    <br>
        <h5><br>Não há bots cadastrados
    <hr>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalBot"><ion-icon name="create-outline"></ion-icon> 
        Cadastrar Bot
    </button>
    </div>
    @endif
</div>
<div class="modal animated fadeInDown dark--hidden" id="ModalBot" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cadastro de Bot</h5>
          <button type="button" class="btn btn-dark close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('bots.salvar') }}" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
                @csrf
                <div class="form-group">
                    <label for="nome_grupo">Nome do grupo:</label>
                    <input type="text" class="form-control" name="nome_grupo" id="nome_grupo" placeholder="nome_grupo do grupo" value="{{ old('nome_grupo') }}">
                </div>
                <div class="form-group">
                    <label for="bot_id">Bot ID:</label>
                    <input type="text" name="bot_id" id="bot_id" class="form-control" placeholder="Id do Bot" value="{{ old('bot_id') }}">
                </div>
                <div class="form-group">
                    <label for="chat_id">Chat ID:</label>
                    <input type="text" name="chat_id" id="chat_id" class="form-control" placeholder="Id do chat" chat_idue="{{ old('chat_id') }}">
                </div>
                <br>
                <input type="submit" name="submit" id="submit" class="btn btn-success" value="Salvar Bot">
                <button class="btn btn-danger" data-dismiss="modal" aria-label="Fechar">Cancelar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
