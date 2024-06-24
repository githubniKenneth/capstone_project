<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderDetails extends Model
{
    protected $guarded = ['id'];
    public $table = 'sales_order_details';

    function item(){
        return $this->belongsTo(ProductItem::class, 'item_id', 'id');
    }

    function package(){
        return $this->belongsTo(ProductPackages::class, 'package_id', 'id');
    }
}
