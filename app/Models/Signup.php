<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'average_close_out',
        'agent',
    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }
}
