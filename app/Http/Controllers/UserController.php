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
    public function welcome()
    {
        return view('welcome');
    }
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
    /*C.R-listar.U-editar.D-apagar*/
    public function index()
    {
        //recuperar os registros do banco de dados
        $users = User::orderByDesc('id')->paginate(20);
        return view('users.index', ['users' => $users]);
    }
    // Carregar o formulário editar usuário
    public function edit(User $user)
    {

        //carregar a view
        return view('users.edit', ['user' => $user]);
    }
    public function update(UserRequest $request, User $user)
    {
        try {
            //Editar as informações do registro no banco de dados
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'description' => $request->desccription,
            ]);
            return redirect()->route('edit.user', ['user' => $user->id])->with('msg', 'Usuário editado com sucesso!');
        } catch (Exception $e) {
            //rediciona no caso de erro
            return back()->withInput()->with('error', 'usuario não editado!');
        }
    }
}
