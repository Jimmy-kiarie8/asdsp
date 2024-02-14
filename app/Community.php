<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Community extends Model
{
    /**
     * Get all of the comments for the Community
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'community_id');
    }
    public function getCreatedAtAttribute($value) 
    {
        return Carbon::parse($value)->format('D d M Y');
    }
}
