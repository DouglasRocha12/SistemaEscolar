@extends('layouts.dashboard')

@section('title')
Início
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')

<br>
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Alunos Cadastrados</h1>
<form action="/aluno/listar" method="post" id="pesquisa">
  @csrf
  <div class="ui right aligned category search">
    <div class="ui icon input">
      <input class="prompt" type="text" name="prompt" placeholder="Pesqueisar...">
      <i class="search icon" id="btn"></i>
    </div>
  </div>
</form>

<script>
  $('#btn').change(function() {
    $("#pesquisa").submit();
  });
</script>

<table class="ui celled table">
  <thead>
    <tr>
      <th>Nome</th>
      <th>CPF</th>
      <th>Email</th>
      <th>Perfil</th>

    </tr>
  </thead>
  <tbody>
    @foreach($alunos as $dados)
    <tr>
      <td>{{$dados->name}}</td>
      <td>{{$dados->document}}</td>
      <td>{{$dados->email}}</td>
      <td align="center">
        <a class="ui blue button" href="/aluno/{{$dados->id}}" ><i class="edit icon"></i></a>
        <a class="ui red button" href="/aluno/deleta/{{$dados->id}}" ><i class="trash icon"></i></a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>



@endsection