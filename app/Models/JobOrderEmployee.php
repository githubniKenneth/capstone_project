<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class JobOrderEmployee extends Model
{
    protected $guarded = ['id'];
    public $table = 'jo_employees';
    
    function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
}
