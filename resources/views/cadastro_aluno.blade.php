@extends('layouts.dashboard')

@section('title')
Início
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')
<link href="/css/cadastro.css" rel="stylesheet">
<script src="/js/cep.js"></script>
<br>
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Cadastrar Aluno</h1>


<form class="ui form msform" action="/aluno/cadastrar" id="msform" method="POST" enctype="multipart/form-data">
    @csrf

    <br><br>

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

    @if($msg_erro === 'Usuarios Cadastrado Com Sucesso')
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
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Nome Completo" value="{{ old('nome') ?? ''}}">
            </div>
            <div class="two fields">
                <div class="field">
                    <label>CPF</label>
                    <input type="number" name="cpf" placeholder="CPF" value="{{ old('cpf') ?? ''}}">
                    <span style="color: red; font-size: 12pt">*apenas numeros</span>
                </div>
                <div class="field">
                    <label>Data de Nascimento</label>
                    <input type="date" name="date" value="{{ old('date') ?? ''}}">
                </div>
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') ?? ''}}">
            </div>
        </div>
        <div class="field">
                    <label>Curso</label>
                    <select class="ui fluid search dropdown" name="curso">
                        <option value="">Selecione Um curso</option>
                        @foreach($cursos as $dados)
                        <option value="{{$dados->id}}">{{$dados->title}}</option>

                        @endforeach

                    </select>
                </div>
        <div class="sixteen wide column" style=" padding: 5px;" align="center">
            <input type="button" class="ui button next1" name="next1" value="Próximo" style="margin: auto;">
        </div>
        <div class="sixteen wide column" style=" padding: 5px;" align="center">
            <button class="ui button enviar" type="submit">Salvar</button>
        </div>
    </section>
    <section class="sombra container">
        <div class="ui form">
            <h4 class="ui dividing header">Endereço</h4>
            <div class="two fields">
                <div class="field">
                    <label>CEP</label>
                    <input type="number" name="cep" id="cep" placeholder="CEP" value="{{ old('cep') ?? ''}}">
                    <span style="color: red; font-size: 12pt">*apenas numeros</span>
                </div>
                <div class="field">
                    <label>Bairro</label>
                    <input type="text" name="bairro" id="bairro" placeholder="Bairro" value="{{ old('bairro') ?? ''}}">
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label>Rua</label>
                    <input type="text" name="rua" id="rua" placeholder="Rua" value="{{ old('rua') ?? ''}}">
                </div>
                <div class="field">
                    <label>Nº</label>
                    <input type="number" name="numero" placeholder="numero" value="{{ old('numero') ?? ''}}">

                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label>Cidade</label>
                    <input type="text" name="cidade" id="cidade" placeholder="Cidade" value="{{ old('cidade') ?? ''}}">
                </div>
                <div class="field">
                    <label>Complemento</label>
                    <input type="text" name="complemento" placeholder="Complemento" value="{{ old('date') ?? ''}}">
                </div>
            </div>

        </div>
        <div class="sixteen wide column" style=" padding: 5px;" align="center">
            <a class="ui button prev" role="button">Anterior</a>
        </div>
        <div class="sixteen wide column" style=" padding: 5px;" align="center">
            <button class="ui button enviar" type="submit">Salvar</button>
        </div>

    </section>
</form>

<script src="/js/etapas.js"></script>
@endsection