<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Employee;

class InvIssuance extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'inv_issuances';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function item()
    {
        return $this->belongsTo(ProductItem::class, 'item_id', 'id');
    }

    function issuer()
    {
        return $this->belongsTo(Employee::class, 'issued_by', 'id');
    }

    function receiver()
    {
        return $this->belongsTo(Employee::class, 'received_by', 'id');
    }
}
