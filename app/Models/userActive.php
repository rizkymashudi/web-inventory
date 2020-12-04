<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userActive extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'web_inventory.user_active';

    public $timestamps = false;
}
