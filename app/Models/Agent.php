<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "agents";

    protected $guarded = ["id"];

    protected $fillable = ["email", "first_name", "last_name", "profile_img", "sales_type", "sales_percentage","hour_rate","sector_of_the_deal","agency_of_deal"];

    protected $appends = ["profile_pic"];

    public function getProfilePicAttribute() {
        $url = "";
        if (!empty($this->attributes['profile_img'])) {
            $url = config('remedy.URL.profiles_pic') . "/" . $this->attributes['profile_img'];
        }
        return $url;
    }

    public function agent_songs() {
        return $this->hasMany(AgentSongs::class, "agent_id", "id");
    }

    public function billings()
    {
        return $this->hasOne('App\Models\Billings');
    }

    public function industry()
    {
        return $this->hasOne('App\Models\Industry');
    }

    public function psls()
    {
        return $this->hasOne('App\Models\Psls');
    }

    public function signup()
    {
        return $this->hasOne('App\Models\Signup');
    }
}
