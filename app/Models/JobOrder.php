<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\SalesOrder;
use App\Models\Client;
use App\Models\WorkScope;
use App\Models\User;

class JobOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function getTurnoverDateAttribute() {//create_date_string
        return Carbon::parse($this->jo_turnover_date);
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id', 'id');
    }

    function orders(){
        return $this->belongsTo(SalesOrder::class, 'order_id', 'id');
    }

    function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    function work_scope(){
        return $this->belongsTo(WorkScope::class, 'scope_id', 'id');
    }

    function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
