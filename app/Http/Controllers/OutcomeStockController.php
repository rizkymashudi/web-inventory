<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomingGoods;
use App\Models\OutcomingGoods;
use Validator;
use Alert;


class OutcomeStockController extends Controller
{
    public function index() {

        $OutcomingGoodsData = OutcomingGoods::all();

        return view('Admin.Stock.OutcomingStock', compact('OutcomingGoodsData'));
    }

    public function store(Request $request){
       

        $OutcomingGoods = $request->all();
       
        $validation = validator::make($OutcomingGoods, [
            'outcomingDate' => 'required',
            'Stockquantity' => 'required'
        ]);

        if($validation->fails()):
            Alert::error('Invalid', $validation->errors()->first());
            return back();
        endif;
        
        $DataStock = IncomingGoods::where('id_transaksi', '=', $OutcomingGoods['TransactionID'])->first();
        $stockLeft = $DataStock->jumlah - $OutcomingGoods['Stockquantity'];
        IncomingGoods::where('id_transaksi', '=', $OutcomingGoods['TransactionID'])->update([
            'jumlah' => $stockLeft
        ]);
        

        OutcomingGoods::create([
            'id_transaksi'  => $OutcomingGoods['TransactionID'],
            'tanggal_masuk' => $OutcomingGoods['inComingDate'],
            'tanggal_keluar'=> $OutcomingGoods['outcomingDate'],
            'kode_barang'   => $OutcomingGoods['ItemCode'],
            'nama_barang'   => $OutcomingGoods['ItemName'],
            'satuan'        => $OutcomingGoods['unit'],
            'jumlah'        => $OutcomingGoods['Stockquantity']
        ]);
        
        Alert::success('Success', 'Update stock success!');
        return back();
    
    }
}
