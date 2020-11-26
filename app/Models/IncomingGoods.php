<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingGoods extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'web_inventory.incominggoods';

    public $timestamps = false;
}
