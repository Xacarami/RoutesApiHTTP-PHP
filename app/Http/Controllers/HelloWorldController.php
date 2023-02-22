<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function hello($name, Request $request) {

        // return '<h3>Que piada ' . $name .'</h3>';
        return response()->json([
            "opa" => "Hello eae {$name}",

            // "garantia" => "opa $request->foo"
            //dentro da uri, o resultado de foo é bar:
            // http://127.0.0.1:8000/api/hello-post/gabriel?foo=bar

            "garantia" => $request->all()
            //retorna todos os valores do request (após o ?)
            // http://127.0.0.1:8000/api/hello-post/gabriel?foo=bar&foo1=bar1

            

        ]);
    }
}
