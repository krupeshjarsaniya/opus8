<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentSongs extends Model
{
    use HasFactory;

    protected $table = "agents_songs";

    protected $guarded = ["id"];

    protected $fillable = ["agent_id", "song_name"];

    protected $appends = ["song_url"];

    public function getSongUrlAttribute() {
        $url = "";
        if (!empty($this->attributes['song_name'])) {
            $url = config('remedy.URL.songs') . "/" . $this->attributes['song_name'];
        }
        return $url;
    }
}
