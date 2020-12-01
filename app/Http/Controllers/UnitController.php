<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Validator;
use App\models\Unit;


class UnitController extends Controller
{
    public function index(){

        $Unit = Unit::all();

        return view('Admin.Stock.Unit', compact('Unit'));
    }
}
