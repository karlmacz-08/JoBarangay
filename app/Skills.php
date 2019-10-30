<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    public function skillsets()
    {
        return $this->hasMany('App\Skillsets', 'skill_id', 'id');
    }
}
