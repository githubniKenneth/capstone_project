<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductItem;
use App\Models\ProductBrand;
use App\Models\ProductResolution;
use App\Models\ProductPackagesDetails;


use Carbon\Carbon;
class ProductPackages extends Model
{
    protected $guarded = ['id'];
    public $table = 'packaged_items';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function item()
    {
        return $this->belongsTo(ProductItem::class, 'item_id', 'id');
    }

    function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'brand_id', 'id');
    }

    function resolution()
    {
        return $this->belongsTo(ProductResolution::class, 'resolution_id', 'id');
    }

    function package_details(){
        return $this->belongsTo(ProductPackagesDetails::class, 'package_id', 'id');
    }

}
