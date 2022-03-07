<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table = "agents";

    protected $guarded = ["id"];

    protected $fillable = ["email", "first_name", "last_name", "profile_img", "sales_type", "sales_percentage"];

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
}
