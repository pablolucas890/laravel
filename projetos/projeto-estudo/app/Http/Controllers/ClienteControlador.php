<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClienteControlador extends Controller
{
    private $clientes = [
        ['id' => '1', 'nome' => 'joao'],
        ['id' => '2', 'nome' => 'maria'],
        ['id' => '3', 'nome' => 'pablo'],
        ['id' => '4', 'nome' => 'marcelo']
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $clientes = session("clientes");
        if(!isset($clientes)){
            session(["clientes" => $this->clientes]);
        }
    }
    public function index()
    {
        //Utilizado para listar os clientes
        $clientes = session("clientes");
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Utilizado para criar um cliente
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Qual o usuario quiser salvar o cliente, o post vai ser enncaminhado pra essa função
        $clientes = session("clientes");
        $id = count($clientes) + 1;
        $nome = $request->name;
        $dados = ['id' => $id, 'nome' => $nome];
        $clientes[] = $dados;
        session(["clientes" => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ver alguns dados do cliente
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //editar o cliente da dlista de clientes
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //efetiva as alterações do cliente no formulario    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deleta o cliente
    }
}
