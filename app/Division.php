<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships as HasManyDeep;

class Division extends Model
{
     public function district()
    {
        return $this->hasMany(District::class, 'id', 'division_id');
    }
    public function thanas()
    {
        return $this->hasManyThrough(Thana::class, District::class);
    }
}