<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\Facade\Pdf;
use PDF;

use Illuminate\Database\Eloquent\Collection;
use function PHPSTORM_META\map;

class EmployeeController extends Controller
{
    public function showEmployees()
    {
        $employee = Employee::all();
        return view('index', compact('employee'));
    }

    // public function createPDF()
    // {
    //     $data = Employee::all();

    //     $pdf = PDF::loadView('printpage', ['dbdata' => $data]);
    //     return $pdf->download('pdf_file.pdf');
    // }

    public function createPDF()
    {
        // retreive all records from db
        $data = Employee::all();
        // share data to view
        //view()->share('employee', $data);
        $pdf = PDF::loadView('employee', ['employee' => $data]);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    // public function generatePDF()
    // {
    //     $data = [
    //         'title' => 'Teste titulo',
    //         'date' => 'Hoje'
    //     ];

    //     $pdf = PDF::loadView('myPDF', $data);
    //     return  $pdf->download('test.pdf');
    // }
}
