<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;
use Carbon\Carbon;

class Group extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function modules()
    {
        return $this->hasMany(Module::class, 'group_id', 'id');
    }

    // function getActiveModulesAttribute()//$group->active_modules
    // {
    //     return Module::where([['status', '1'],['group_id',$this->id]])->get();
    // }
}
