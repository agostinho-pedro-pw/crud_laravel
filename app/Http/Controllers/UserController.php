<?php

namespace App\Http\Controllers;

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
    public function create(){   
        return view ('users.create');
    }  
    /*logica para o post de formulário a DB*/
    public function store(Request $request){
        /*tratamento de excepcções no php*/
        try{  
        //dd($request);
            User::create([ 
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'description'=>$request->description
            ]);
            return redirect()->route('create.user')->with('sucess', 'usuario cadastrado com   sucesso!');
        
        }catch(Exception $e){
            return back()->withInput()->with('error', 'usuario não cadastrado!');
        }
    }
}
