@extends('layout')

@section('cabecalho')
Séries
@endsection
@section('conteudo')
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
<form method="post">
    @csrf
        <div class="form-group">
            <label for="Nome" class="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
    <button class="btn btn-primary"> Adicionar</button>
    </form>
</div>
@endsection