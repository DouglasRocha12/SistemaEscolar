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
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Dados Matricula</h1>


<form class="ui form msform" action="/matricular/update" id="msform" method="POST" enctype="multipart/form-data">
    @csrf

    <br><br>

    <br>


  



        <section class="sombra container">
            <div class="ui form">

           <input type="hidden" name="id" value="{{$matriculas[0]->id}}">
                <!-- primeira aba do cadastro -->
                <div class="field">
                    <label>Aluno</label>

                    <select class="ui fluid search dropdown" name="aluno">
                        <option value=""> {{$matriculas[0]->name}}</option>
                        @foreach($alunos as $dados)
                        <option value="{{$dados->id}}">{{$dados->name}} - {{$dados->document}}</option>

                        @endforeach

                    </select>


                </div>

                <div class="field">
                    <label>Curso</label>
                    <select class="ui fluid search dropdown" name="curso">
                        <option value=""> {{$matriculas[0]->title}}</option>
                        @foreach($cursos as $dados)
                        <option value="{{$dados->id}}">{{$dados->title}}</option>

                        @endforeach

                    </select>
                </div>
            </div>

            <div class="sixteen wide column" style=" padding: 5px;" align="center">
                <button class="ui button enviar" type="submit">Salvar</button>
            </div>
        </section>

</form>

<script>
    $('.ui.dropdown')
        .dropdown();
</script>
@endsection