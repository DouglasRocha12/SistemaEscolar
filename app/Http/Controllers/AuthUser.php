<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthUser extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        $usuario =  auth()->user();
        return view('home', compact('usuario'));
    }

    public function alunos_cadastrar()
    {
        $cursos = DB::table('cursos')->get();


        return view('cadastro_aluno', compact('cursos'));
    }

    public function alunos_cadastrar_salvar(Request $request)
    {
        $cursos = DB::table('cursos')->get();
        $validated = $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required',
        ]);

        $user = DB::table('alunos')->where('document',  $request->cpf)->first();
        if ($user == null) {
            $hoje = $agora = date('Y-m-d H:i:m');

            $user = DB::table('alunos')->insert([
                'name' => $request->nome,
                'document' => $request->cpf,
                'email' => $request->email,
                'data' => $request->date,
                'rua' => $request->rua,
                'numero' => $request->numero,
                'cep' => $request->cep,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'created_at' => $hoje,
                'updated_at' => $hoje
            ]);

            
            if ($request->curso != NULL) {
                $user = DB::table('alunos')->where('document',  $request->cpf)->first();

                DB::table('cursos_alunos')->insert([
                    'id_aluno' => $user->id,
                    'id_cursos' => $request->curso,
                    'created_at' => $hoje,
                    'updated_at' => $hoje
                ]);
            }
            $msg_erro = "Usuarios Cadastrado Com Sucesso";
            return view('cadastro_aluno', compact('msg_erro', 'cursos'));
        } else {

            $msg_erro = "Usuarios Já Cadastrado";
            return view('cadastro_aluno', compact('msg_erro','cursos'));
        }
    }

    public function alunos_listar()
    {

        $alunos = DB::table('alunos')->get();

        return view('lista_alunos', compact('alunos'));
    }
    public function alunos_listar_pesquisa(Request $request)
    {
        // dd($request);
        $alunos = DB::table('alunos')->where('document', 'like', '%' . $request->prompt . '%')
            ->orWhere('email', 'like', '%' . $request->prompt . '%')
            ->orWhere('name', 'like', '%' . $request->prompt . '%')
            ->get();
        // $alunos = DB::table('alunos')->get();

        return view('lista_alunos', compact('alunos'));
    }
    public function aluno_deletar($id)
    {
        DB::table('cursos_alunos')->where('id_aluno', $id)->delete();
        DB::table('alunos')->where('id', $id)->delete();
        return redirect('/aluno/listar');
    }
    public function alunos_visualisar($id)
    {
        $user = DB::table('alunos')->where('id',  $id)->first();
        $matriculas = DB::table('cursos_alunos')
            ->join('cursos', 'cursos.id', '=', 'cursos_alunos.id_cursos')
            ->join('alunos', 'alunos.id', '=', 'cursos_alunos.id_aluno')
            ->where('id_aluno',  $id)
            ->select('cursos_alunos.*', 'cursos.title', 'alunos.name', 'alunos.document')->get();
        return view('visualizar_aluno', compact('user', 'matriculas'));
    }

    public function alunos_visualisar_salvar(Request $request)
    {
        $hoje = $agora = date('Y-m-d H:i:m');
        $user = DB::table('alunos')->where('id',  $request->id)
            ->update([
                'name' => $request->nome,
                'document' => $request->cpf,
                'email' => $request->email,
                'data' => $request->date,
                'rua' => $request->rua,
                'numero' => $request->numero,
                'cep' => $request->cep,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'updated_at' => $hoje

            ]);
        return redirect('/aluno/' . $request->id);
    }
    public function cursos_cadastrar()
    {
        return view('cadastro_curso');
    }

    public function cursos_cadastrar_salvar(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required',
        ]);

        $user = DB::table('cursos')->where('title',  $request->titulo)->first();
        if ($user == null) {

            $hoje = $agora = date('Y-m-d H:i:m');

            DB::table('cursos')->insert([
                'title' => $request->titulo,
                'descripition' => $request->descricao,
                'created_at' => $hoje,
                'updated_at' => $hoje
            ]);
            $msg_erro = "Curso Cadastrado Com Sucesso";
            return view('cadastro_curso', compact('msg_erro'));
        } else {

            $msg_erro = "Curso Já Cadastrado";
            return view('cadastro_curso', compact('msg_erro'));
        }
    }
    public function cursos_listar()
    {
        $cursos = DB::table('cursos')->get();

        return view('lista_cursos', compact('cursos'));
    }

    public function cursos_visualisar($id)
    {
        $user = DB::table('cursos')->where('id',  $id)->first();
        $matriculas = DB::table('cursos_alunos')
            ->join('cursos', 'cursos.id', '=', 'cursos_alunos.id_cursos')
            ->join('alunos', 'alunos.id', '=', 'cursos_alunos.id_aluno')
            ->where('id_cursos',  $id)
            ->select('cursos_alunos.*', 'cursos.title', 'alunos.name', 'alunos.document')->get();
        return view('visualizar_curso', compact('user', 'matriculas'));
    }

    public function cursos_visualisar_salvar(Request $request)
    {
        $hoje = $agora = date('Y-m-d H:i:m');
        $user = DB::table('cursos')->where('id',  $request->id)
            ->update([
                'title' => $request->titulo,
                'descripition' => $request->descricao,
                'updated_at' => $hoje

            ]);
        return redirect('/curso/' . $request->id);
    }

    public function cursos_listar_pesquisa(Request $request)
    {
        // dd($request);
        $cursos = DB::table('cursos')->where('title', 'like', '%' . $request->prompt . '%')
            ->orWhere('descripition', 'like', '%' . $request->prompt . '%')
            ->get();
        // $alunos = DB::table('alunos')->get();

        return view('lista_cursos', compact('cursos'));
    }
    public function cursos_deletar($id)
    {
        DB::table('cursos_alunos')->where('id_aluno', $id)->delete();
        DB::table('cursos')->where('id', $id)->delete();
        return redirect('/curso/listar');
    }

    public function matricular()
    {
        $cursos = DB::table('cursos')->get();
        $alunos = DB::table('alunos')->get();

        return view('matricular', compact('alunos', 'cursos'));
    }

    public function matricular_salvar(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'aluno' => 'required',
            'curso' => 'required',
        ]);

        $user = DB::table('cursos_alunos')
            ->where('id_cursos',  $request->curso)
            ->where('id_aluno',  $request->aluno)
            ->first();
        if ($user == null) {
            $cursos = DB::table('cursos')->get();
            $alunos = DB::table('alunos')->get();
            $hoje = $agora = date('Y-m-d H:i:m');

            DB::table('cursos_alunos')->insert([
                'id_aluno' => $request->aluno,
                'id_cursos' => $request->curso,
                'created_at' => $hoje,
                'updated_at' => $hoje
            ]);
            $msg_erro = "Matricula Efetuada Com Sucesso";
            return view('matricular', compact('msg_erro', 'alunos', 'cursos'));
        } else {
            $cursos = DB::table('cursos')->get();
            $alunos = DB::table('alunos')->get();
            $msg_erro = "Matricula Já Efetuada";
            return view('matricular', compact('msg_erro', 'alunos', 'cursos'));
        }
    }


    public function matricula_listar()
    {
        $matriculas = DB::table('cursos_alunos')
            ->join('cursos', 'cursos.id', '=', 'cursos_alunos.id_cursos')
            ->join('alunos', 'alunos.id', '=', 'cursos_alunos.id_aluno')
            ->select('cursos_alunos.*', 'cursos.title', 'alunos.name', 'alunos.document', 'alunos.email')->get();

        return view('lista_matricula', compact('matriculas'));
    }

    public function matricula_visualisar($id)
    {
        $cursos = DB::table('cursos')->get();
        $alunos = DB::table('alunos')->get();
        $matriculas = DB::table('cursos_alunos')
            ->where('cursos_alunos.id',  $id)
            ->join('cursos', 'cursos.id', '=', 'cursos_alunos.id_cursos')
            ->join('alunos', 'alunos.id', '=', 'cursos_alunos.id_aluno')
            ->select('cursos_alunos.*', 'cursos.title', 'alunos.name', 'alunos.document', 'alunos.email')->get();
        return view('visualizar_matricula', compact('alunos', 'cursos', 'matriculas'));
    }

    public function matricula_visualisar_salvar(Request $request)
    {
        $hoje = $agora = date('Y-m-d H:i:m');
        $user = DB::table('cursos_alunos')->where('id',  $request->id)
            ->update([
                'id_aluno' => $request->aluno,
                'id_cursos' => $request->curso,
                'updated_at' => $hoje

            ]);
        return redirect('/matricular/' . $request->id);
    }
    public function  matricula_listar_pesquisa(Request $request)
    {
        // dd($request);

        $matriculas = DB::table('cursos_alunos')
            ->join('cursos', 'cursos.id', '=', 'cursos_alunos.id_cursos')
            ->join('alunos', 'alunos.id', '=', 'cursos_alunos.id_aluno')
            ->Where('cursos.title', 'like', '%' . $request->prompt . '%')
            ->orWhere('alunos.document', 'like', '%' . $request->prompt . '%')
            ->orWhere('alunos.email', 'like', '%' . $request->prompt . '%')
            ->orWhere('alunos.name', 'like', '%' . $request->prompt . '%')
            ->select('cursos_alunos.*', 'cursos.title', 'alunos.name', 'alunos.document', 'alunos.email')->get();

        // $alunos = DB::table('alunos')->get();

        return view('lista_matricula', compact('matriculas'));
    }
    public function  matricula_deletar($id)
    {
        DB::table('cursos_alunos')->where('id', $id)->delete();

        return redirect('/matricular/listar');
    }
}
