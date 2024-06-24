<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\SalesQuotationDetails;
use App\Models\Client;
use App\Models\Branch;

class SalesQuotation extends Model
{
    protected $guarded = ['id'];
    public $table = 'sales_quotations';

    function getCdsAttribute() {//create_date_string
        return Carbon::parse($this->created_at);
    }

    function quotation_details(){
        return $this->hasMany(SalesQuotationDetails::class, 'quotation_id');
    }

    function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    function branch(){
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    
    function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
