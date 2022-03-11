<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industry extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "industries";

    protected $guarded = ["id"];

    protected $fillable = ["agent_id","health_care","IT", "gas_oil", "hospitality","logistics","construction","industrial","finance"];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }
}
