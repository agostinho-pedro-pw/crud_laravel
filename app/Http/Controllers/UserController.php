<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;

class UserController extends Controller
{
    /*
    public function create ()
    {
    return dd('Formulairo');
    } */
    public function create()
    {
        return view('users.create');
    }
    /*logica para o post de formulário a DB*/
    public function store(UserRequest $request)
    {
        /*tratamento de excepcções no php*/
        try {
            //dd($request);
            //usar para cadastrar no banco de dados na tabela users
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'description' => $request->description
            ]);
            return redirect()->route('create.user')->with('sucess', 'usuario cadastrado com   sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'usuario não cadastrado!');
        }
    }
    /*Listar os usuários*/
    public function index()
    {
        //recuperar os registros do banco de dados
        $users = User::orderByDesc('id')->paginate(20);
        return view('users.index', ['users' => $users]);
    }
}
