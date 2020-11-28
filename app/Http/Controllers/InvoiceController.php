<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Invoice;
use App\Models\OutcomingGoods;
use DB;

class InvoiceController extends Controller
{
    public function generateInvoice(Request $request, $transactionID){
        
        
        $Invoice = OutcomingGoods::where('id_transaksi', '=', strval($transactionID))->get();
        $id      = OutcomingGoods::select(DB::raw('sum(jumlah) as jml'), 'outcominggoods.*')->where('id_transaksi', '=', $transactionID)->groupBy('id_transaksi')->first();
        $pdf    =  PDF::loadView('Admin.Stock.PrintPDF', compact('Invoice', 'id'))->setPaper('a4', 'portrait');

        return $pdf->stream();
    }

}
