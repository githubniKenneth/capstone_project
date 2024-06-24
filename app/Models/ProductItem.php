<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use App\Models\ProductBrand;
use App\Models\ProductSeries;
use App\Models\ProductResolution;
use App\Models\ProductCategory;
use App\Models\UnitOfMeasurement;
use App\Models\InvStocks;

use Carbon\Carbon;

class ProductItem extends Model
{
    protected $guarded = ['id'];
    public $table = 'product_items';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'brand_id', 'id');
    }

    function series()
    {
        return $this->belongsTo(ProductSeries::class, 'series_id', 'id');
    }

    function resolution()
    {
        return $this->belongsTo(ProductResolution::class, 'resolution_id', 'id');
    }

    function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    function uom()
    {
        return $this->belongsTo(UnitOfMeasurement::class, 'uom_id', 'id');
    }

    function balance()
    {
        return $this->belongsTo(InvStocks::class, 'id', 'item_id');
    }
}
