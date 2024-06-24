<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductItem;
use App\Models\ProductPackages;

class SalesQuotationDetails extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'sales_quotation_details';

    function item(){
        return $this->belongsTo(ProductItem::class, 'item_id', 'id');
    }

    function package(){
        return $this->belongsTo(ProductPackages::class, 'package_id', 'id');
    }
}
