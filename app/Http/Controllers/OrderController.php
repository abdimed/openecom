<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function bill(Order $order)
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->Bookmark('Start of the document');
        $mpdf->WriteHTML(View::make('pdf.bill',['order'=>$order]));
        $mpdf->Output();
    }
}
