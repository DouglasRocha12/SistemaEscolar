@extends('layouts.dashboard')

@section('title')
Início
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')

<br>
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Dados Aluno</h1>


<form class="ui form container" action="/aluno"method="POST" enctype="multipart/form-data">
    @csrf

    <br>
       <div class="ui form">
            <input type="hidden" name="id" value="{{ $user->id }}">
            <h4 class="ui dividing header">Dados Cadastrais</h4>
            <!-- primeira aba do cadastro -->
            <div class="field">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Nome Completo" value="{{ $user->name ?? ''}}">
            </div>
            <div class="two fields">
                <div class="field">
                    <label>CPF</label>
                    <input type="number" name="cpf" placeholder="CPF" value="{{$user->document ?? ''}}">
                    <span style="color: red; font-size: 12pt">*apenas numeros</span>
                </div>
                <div class="field">
                    <label>Data de Nascimento</label>
                    <input type="date" name="date"  value="{{$user->data ?? ''}}">
                </div>
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email"  value="{{$user->email ?? ''}}">
            </div>
        </div>

        <div class="ui form">
            <h4 class="ui dividing header">Endereço</h4>
            <div class="two fields">
                <div class="field">
                    <label>CEP</label>
                    <input type="number" name="cep" id="cep" placeholder="CEP"  value="{{$user->cep ?? ''}}">
                    <span style="color: red; font-size: 12pt">*apenas numeros</span>
                </div>
                <div class="field">
                    <label>Bairro</label>
                    <input type="text" name="bairro" id="bairro" placeholder="Bairro" value="{{$user->bairro ?? ''}}">
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label>Rua</label>
                    <input type="text" name="rua" id="rua" placeholder="Rua"  value="{{$user->rua ?? ''}}">
                </div>
                <div class="field">
                    <label>Nº</label>
                    <input type="number" name="numero" placeholder="numero"  value="{{$user->numero ?? ''}}">

                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label>Cidade</label>
                    <input type="text" name="cidade" id="cidade" placeholder="Cidade"  value="{{$user->cidade ?? ''}}">
                </div>
                <div class="field">
                    <label>Complemento</label>
                    <input type="text" name="complemento" placeholder="Complemento" value="{{$user->complemento ?? ''}}">
                </div>
            </div>

        </div>
       
        <div class="sixteen wide column" style=" padding: 5px;" align="center">
            <button class="ui button enviar" type="submit">Salvar</button>
        </div>
</form>



<h3 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Matriculas</h3>


<table class="ui celled table">
  <thead>
    <tr><th>ID</th>
    <th>Titulo</th>
  
  
  </tr></thead>
  <tbody>
      @foreach($matriculas as $dados)
    <tr>
      <td>{{$dados->id}}</td>
      <td>{{$dados->title}}</td>
     
     
    </tr>
@endforeach
  </tbody>
</table>

<script src="/js/etapas.js"></script>
@endsection