<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvReceiving extends Model
{
    protected $guarded = ['id'];
    public $table = 'inv_receivings';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }
}
