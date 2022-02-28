@extends('layouts.dashboard')

@section('title')
Início
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')

<br>
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Cursos Cadastrados</h1>
<form action="/curso/listar" method="post" id="pesquisa">
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
    <tr><th>ID</th>
    <th>Titulo</th>
    <th>Perfil</th>
  
  </tr></thead>
  <tbody>
      @foreach($cursos as $dados)
    <tr>
      <td>{{$dados->id}}</td>
      <td>{{$dados->title}}</td>
      <td align="center">
        <a class="ui blue button" href="/curso/{{$dados->id}}" ><i class="edit icon"></i></a>
        <a class="ui red button" href="/curso/deleta/{{$dados->id}}" ><i class="trash icon"></i></a>
      </td>
    </tr>
@endforeach
  </tbody>
</table>



@endsection