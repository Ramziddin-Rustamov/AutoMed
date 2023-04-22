<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{

    public function dowloadPDf()
    {
        $service = Service::orderBy('id', 'DESC')->first();
        $pdf =  PDF::loadView('pdf.service', [
            'service' => $service
        ]);
        $pdf->save(public_path('service.pdf'));
        shell_exec("py D:\servicePrint.py");
        return redirect()->to('service');;
    }
    public function index()
    {
        $service = Service::orderBy('id', 'DESC')->first();
        return view('pdf.service', [
            'service' => $service
        ]);
    }
}