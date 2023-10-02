<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePdf()
    {
        $html = view('PdfTemplates.invoice')->render();
        $pdf = PDF::loadHtml($html);
  
        return $pdf->stream('itsolutionstuff.pdf');
    }

    
    
    
  
}
