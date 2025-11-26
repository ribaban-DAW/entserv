<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivController extends Controller {
    public function index() {
        return view('div');
    }

    public function div(Request $request) {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');

        if ($num2 == 0) {
            return view('div', [
                'resultado' => "undefined"
            ]);
        }
        
        $resultado = $num1 / $num2;

        return view('div', [
            'resultado' => $resultado
        ]);
    }
}

?>
