@extends('layouts.main')

@section('title', 'Editar Office')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/Office" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Edite o Office</h1>
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
    <form action="/editOffice/update/{{ $office->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="usuario">Usuário*</label>
            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nome do usuario..." value="{{ $office->usuario }}">
        </div>
        <div class="form-group">
            <label for="setor">Setor*</label>
            <input type="text" name="setor" id="setor" class="form-control" placeholder="Setor..." value="{{ $office->setor }}">
        </div>
        <div class="form-group">
            <label for="versao">Versao*</label>
            <input type="text" name="versao" id="versao" class="form-control" placeholder="Versão do Office..." value="{{ $office->versao }}">
        </div>
        <div class="form-group">
            <label for="conta">Conta*</label>
            <input type="text" name="conta" id="conta" class="form-control" placeholder="Conta cadastrada..." value="{{ $office->conta }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Office">
        <a href="/Office" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
