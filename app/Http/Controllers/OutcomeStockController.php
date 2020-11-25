<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutcomeStockController extends Controller
{
    public function index() {
        return view('Admin.Stock.OutcomingStock');
    }
}
