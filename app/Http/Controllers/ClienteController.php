<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Http\Requests\ClienteUpdateFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    
    public function indexCliente()
    {
        $clientes = Cliente::all();

        $clientesComfoto = $clientes->map(function ($cliente) {
            return [
                'nome' => $cliente->nome,
                'telefone' => $cliente->telefone,
                'cpf' => $cliente->cpf,
                'endereco' => $cliente->endereco,
                'email'=> $cliente->email,
                'password'=>Hash::make($cliente->password),
                'foto' => asset('storage/' . $cliente->foto),
            ];
        });
        return response()->json($clientesComfoto);
    }
    public function storeCliente(ClienteFormRequest $request)
    {
        $clienteData = $request->all();

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $nomefoto = time(). '.'. $foto->getClientOriginalExtension();
            $caminhofoto = $foto->storeAs('foto/clientes',$nomefoto, 'public');
            $clienteData['foto'] = $caminhofoto;
        }
        $cliente = cliente::create($clienteData);
        return response ()-> json (['cliente' => $cliente],201);
    }
   
}
