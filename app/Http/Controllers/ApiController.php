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
                'message' => 'Sucesso',
                'data' => $clients
            ],
            200
        );
    }
}
