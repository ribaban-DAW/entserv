<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultController extends Controller {
    public function index() {
        return view('mult');
    }

    public function mult(Request $request) {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        
        $resultado = $num1 * $num2;

        return view('mult', [
            'resultado' => $resultado
        ]);
    }
}

?>
