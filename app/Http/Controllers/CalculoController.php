<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class CalculoController extends Controller
{
    public function calcular(Request $request)
    {
        // $fields = $request->validate([
        //     'valor1' => 'required',
        //     'valor2' => 'required',
        // ]);
        $valor1 = $request->input('valor1');
        $valor2 = $request->input('valor2');

        $data = [
            'valor1' => $valor1,
            'valor2' => $valor2
        ];


        // $pdf = PDF::loadView('proposal', ['data' => $fields]);
        $pdf = PDF::loadView('proposal', $data);
        //return $pdf->download('pdf_file.pdf');

        $response = [
            'message' => 'Posto registrado'
        ];

        //return response($pdf->download('pdf_file.pdf'), 200);
        //return response($pdf->stream('pdf_file.pdf'), 200);
        return $pdf->download('pdf_file.pdf');
        //return response($pdf, 200);
    }
}
