<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaController extends Controller {
    public function index() {
        return view('resta');
    }

    public function resta(Request $request) {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        
        $resultado = $num1 - $num2;

        return view('resta', [
            'resultado' => $resultado
        ]);
    }
}

?>
