<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccessGroup extends Model
{
    protected $guarded = ['id'];
    public $table = 'user_access_groups';
}
