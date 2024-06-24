<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductItem;

class InvStocks extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'inv_stocks';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function item()
    {
        return $this->belongsTo(ProductItem::class, 'item_id', 'id');
    }
}
