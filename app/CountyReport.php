<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountyReport extends Model
{

    public function getCountyAttribute($value)
    {
        if (!$value) {
            return 'National';
        } else {
            return $value;
        }
    }
}
