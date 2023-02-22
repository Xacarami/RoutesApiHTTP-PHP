<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll(){

        $bands = $this->getBands();

        return response()->json($bands);
    }

    public function getById($id){
        $band = null;

        foreach ($this->getBands() as $_band) {
            if ($_band['id'] == $id){
                $band = $_band;
            }
        }
        // return $band;
        //kkk esse de cima funciona tbm, mas vamo seguir o curs
        return $band ? response()->json($band) : abort(404);
    }

    public function getByGender($gender){
        $bands = [];
        $i = 0;

        foreach ($this->getBands() as $_band) {
            if ($_band['gender'] == $gender){
                $bands[$i] = $_band;
                $i++;
            }
        }

        return response()->json($bands);
    }

    public function store(Request $request){
        $validate = $request->validate([
            "id" => "numeric",
            "name"=> "required|min:3"
            //precisa ter nome com pelo menos 3 letras
            //pra saber melhor, ve as validações no site da laravel
        ]);

        return response()->json($request->all());
    }


    protected function getBands(){
        return [
            [
                "id" => 1, "name" => "Joji", "gender" => "sad"
            ],
            [
                "id" => 2, "name" => "Billie Eilish", "gender" => "sad"
            ],
            [
                "id" => 3, "name" => "Washington Brasileiro", "gender" => "feliz"
            ]
        ];
    }
}
