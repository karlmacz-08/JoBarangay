<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swipes extends Model
{
    public function swiper()
    {
      return $this->belongsTo('App\Users', 'swiper_id', 'id');
    }

    public function target_user()
    {
      return $this->belongsTo('App\Users', 'target_user_id', 'id');
    }
}
