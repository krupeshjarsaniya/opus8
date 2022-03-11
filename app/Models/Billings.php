<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billings extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "billings";

    protected $guarded = ["id"];

    protected $fillable = ["agent_id","weekly_billing", "average_close_out", "percentage"];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }
}
