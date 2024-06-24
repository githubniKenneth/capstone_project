<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProductSeries extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'product_series';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }
}
