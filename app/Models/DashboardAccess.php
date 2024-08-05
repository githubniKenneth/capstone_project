<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardAccess extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public $table = 'dashboard_access';

    public function role()
    {
        return $this->belongsTo('App\Models\UserRole', 'role_id', 'id');
    }
}
