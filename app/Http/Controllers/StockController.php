<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomingGoods;

class StockController extends Controller
{
    public function index(){

        $items = IncomingGoods::all();
        
        return view('Admin.Stock.incomingStock', compact('items'));
    }
}
