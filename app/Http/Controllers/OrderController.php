<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function bill(Order $order)
    {

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
        ]);
        $mpdf->WriteHTML(View::make('pdf.bill', ['order' => $order]));
        $mpdf->Output();
    }

    public function complete()
    {
        return view('pages.order-complete');
    }
}
