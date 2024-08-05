<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductItem;
use App\Models\UnitOfMeasurement;

class InvReceivingDetails extends Model
{
    protected $guarded = ['id'];
    public $table = 'inv_receiving_details';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function item(){
        return $this->belongsTo(ProductItem::class, 'item_id', 'id');
    }
}
