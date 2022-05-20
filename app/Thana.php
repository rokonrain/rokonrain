<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;

class Thana extends Model
{
        public function district (){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
