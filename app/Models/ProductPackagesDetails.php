<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPackagesDetails extends Model
{
    protected $guarded = ['id'];
    public $table = 'packaged_item_details';
    
    function item()
    {
        return $this->belongsTo(ProductItem::class, 'item_id', 'id');
    }
}
