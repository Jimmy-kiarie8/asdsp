<?php

namespace Modules\Usermanagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Innovation extends Model
{
    // use SoftDeletes;
    protected $fillable = [];

    public function valuechain()
    {
        return $this->belongsTo(ValueChain::class,'value_chain_id');
    }

    public function node()
    {
        return $this->belongsTo(NodeType::class,'node_id');
    }

    public function county()
    {
        return $this->belongsTo(County::class,'county_id');
    }
}
