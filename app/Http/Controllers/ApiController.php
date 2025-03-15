<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function status()
    {
        return response()->json(
            [
                'status' => 'ok',
                'message' => 'A API está rodando'
            ],
            200
        );
    }

    public function clients()
    {
        $clients = Client::paginate(10);
        return response()->json(
            [
                'status' => 'ok',
                'message' => 'Clientes obtidos com sucesso',
                'data' => $clients
            ],
            200
        );
    }

    public function clientById($id)
    {
        $client = Client::find($id);
        return response()->json(
            [
                'status' => 'ok',
                'message' => 'Cliente encontrado com sucesso',
                'data' => $client
            ],
            200
        );
    }

    public function client(Request $request)
    {
        // check if is provided
        if (!$request->id) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'O ID do cliente é obrigatório',
                ],
                400
            );
        }

        $client = Client::find($request->id);

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'Cliente recuperado com sucesso',
                'data' => $client
            ],
            200
        );
    }

    public function addClient(Request $request)
    {
        // create a new client
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'Cliente criado com sucesso',
                'data' => $client
            ],
            200
        );
    }

    public function updateClient(Request $request)
    {
        if (!$request->id) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'O ID do cliente é obrigatório',
                ],
                400
            );
        }

        // update client
        $client = Client::find($request->id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'O Cliente foi atualizado',
                'data' => $client
            ],
            200
        );
    }

    public function deleteClient($id)
    {
        // get client data by id
        $client = Client::find($id);
        // delete client
        $client->delete();

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'O cliente foi deletado',
            ],
            200
        );
    }
}
