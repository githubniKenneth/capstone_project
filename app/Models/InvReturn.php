<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Employee;

class InvReturn extends Model
{
    protected $guarded = ['id'];
    public $table = 'inv_returns';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function returner()
    {
        return $this->belongsTo(Employee::class, 'returned_by', 'id');
    }

    function receiver()
    {
        return $this->belongsTo(Employee::class, 'received_by', 'id');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id', 'id');
    }
}
