<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePayment extends Model
{
    public $table = 'online_payments';
    protected $guarded = ['id'];

    function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    function branch(){
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
