<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutcomingGoods extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'web_inventory.outcominggoods';

    public $timestamps = false;
}
