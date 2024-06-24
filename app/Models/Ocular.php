<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Ocular extends Model
{
    
    
    public $table = 'dep_oculars';
    protected $guarded = ['id'];

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}