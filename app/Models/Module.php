<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Group;

class Module extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id'); 
        // return $this->belongsTo('App\Models\AcctgAccountGeneralLedger', 'gl_account_id', 'id');
    }
}
