<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\ProductItem;

class EmployeeInventory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'employee_inventory';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function item()
    {
        return $this->belongsTo(ProductItem::class, 'item_id', 'id');
    }

    function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
}
