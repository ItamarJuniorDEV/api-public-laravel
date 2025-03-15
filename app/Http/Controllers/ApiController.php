<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function status() {
        return "Status Ok";
    }

    public function clients() {
        return "Todos clientes";
        
    }
}
