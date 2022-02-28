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
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Cadastrar Curso</h1>


<form class="ui form msform" action="/curso/cadastrar" id="msform" method="POST" enctype="multipart/form-data">
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

            <h4 class="ui dividing header">Dados Cadastrais</h4>
            <!-- primeira aba do cadastro -->
            <div class="field">
                <label>Titulo</label>
                <input type="text" name="titulo" placeholder="Titulo do Curso" value="{{ old('titulo') ?? ''}}">
            </div>
            
            <div class="field">
                <label>Dascrição</label>
                <textarea name="descricao"cols="30" rows="10">{{ old('descricao') ?? ''}}</textarea>
            </div>
        </div>
     
        <div class="sixteen wide column" style=" padding: 5px;" align="center">
            <button class="ui button enviar" type="submit">Salvar</button>
        </div>
    </section>
    
</form>

<script src="/js/etapas.js"></script>
@endsection