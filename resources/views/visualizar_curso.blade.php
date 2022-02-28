@extends('layouts.dashboard')

@section('title')
Início
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')
<link href="/css/cadastro.css" rel="stylesheet">

<br>
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Dados Curso</h1>


<form class="ui form msform" action="/curso" id="msform" method="POST" enctype="multipart/form-data">
    @csrf


    <br>


    @if ($errors->any())
    <div class="ui red message">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(isset($msg_erro))

    @if($msg_erro === 'Curso Cadastrado Com Sucesso')
    <div class="ui green message">
        @else
        <div class="ui red message">

            @endif
            <ul>
                <li>{{$msg_erro}}</li>
            </ul>
        </div>
  
    @endif



    <section class="sombra container">
        <div class="ui form">
    <input type="hidden" name="id" value="{{ $user->id}}">
            <h4 class="ui dividing header">Dados Cadastrais</h4>
            <!-- primeira aba do cadastro -->
            <div class="field">
                <label>Titulo</label>
                <input type="text" name="titulo" placeholder="Titulo do Curso" value="{{ $user->title ?? ''}}">
            </div>
            
            <div class="field">
                <label>Dascrição</label>
                <textarea name="descricao"cols="30" rows="10">{{ $user->descripition ?? ''}}</textarea>
            </div>
        </div>
     
        <div class="sixteen wide column" style=" padding: 5px;" align="center">
            <button class="ui button enviar" type="submit">Salvar</button>
        </div>
    </section>
    
</form>


<h3 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Matriculas</h3>


<table class="ui celled table">
  <thead>
    <tr><th>ID</th>
    <th>Nome</th>
    <th>CPF</th>
  
  </tr></thead>
  <tbody>
      @foreach($matriculas as $dados)
    <tr>
      <td>{{$dados->id}}</td>
      <td>{{$dados->name}}</td>
      <td>{{$dados->document}}</td>
     
    </tr>
@endforeach
  </tbody>
</table>

<script src="/js/etapas.js"></script>
@endsection