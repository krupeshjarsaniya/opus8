<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Psls extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'agent_id',
        'new_on_board',
        'sector',
        'company',
        'percentage'
    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }
}
