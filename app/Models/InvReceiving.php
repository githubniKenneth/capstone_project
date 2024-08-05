<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InvReceiving extends Model
{
    protected $guarded = ['id'];
    public $table = 'inv_receivings';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
