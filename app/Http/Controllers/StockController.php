<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomingGoods;
use App\Models\Unit;
use Validator;

class StockController extends Controller
{
    public function index(){

        $items = IncomingGoods::all();
        $Unit  = Unit::all();

        return view('Admin.Stock.incomingStock', compact('items', 'Unit'));
    }

    public function store(Request $request){

        $IncomingGoodsData = $request->all();

        $validator = Validator::make($IncomingGoodsData, [
            'Date'      =>  'required',
            'ItemCode'  =>  'required',
            'ItemName'  =>  'required',
            'unit'      =>  'required',
            'Stockquantity' => 'required'
        ]);

        if($validator->fails()):
            alert()->error('Error', $validator->errors()->first());
            return back();
        endif;

        IncomingGoods::create([
            'id_transaksi' => $IncomingGoodsData['TransactionID'],
            'tanggal'      => $IncomingGoodsData['Date'],
            'kode_barang'  => $IncomingGoodsData['ItemCode'],
            'nama_barang'  => $IncomingGoodsData['ItemName'],
            'satuan'       => $IncomingGoodsData['unit'],
            'jumlah'       => $IncomingGoodsData['Stockquantity']
        ]);

        return back()->with('success', 'Insert data success');

    }
}
