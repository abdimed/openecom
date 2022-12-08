<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function bill(Order $order)
    {
        if (session()->has('orderPosted')) {

            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
            ]);
            $mpdf->WriteHTML(View::make('pdf.bill', ['order' => $order]));
            $mpdf->Output();
        }
        else return 'zebi';
    }

    public function complete()
    {
        return view('pages.order-complete');
    }
}
