<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalesOrderDetails;
use App\Models\Employee;
use App\Models\Branch;
use Carbon\Carbon;

class SalesOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'sales_orders';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function order_details(){
        return $this->hasMany(SalesOrderDetails::class, 'order_id');
    }

    function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    function employee(){
        return $this->belongsTo(Employee::class, 'created_by', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
