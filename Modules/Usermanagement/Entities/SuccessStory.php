<?php

namespace Modules\Usermanagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Usermanagement\Entities\County;
class SuccessStory extends Model
{
    protected $fillable = [];

    public function county()
    {
        return $this->belongsTo(County::class,'county_id');
    }
    
    public function valuechain()
    {
        return $this->belongsTo(ValueChain::class,'value_chain_id');
    }

    public function node()
    {
        return $this->belongsTo(NodeType::class,'node_id');
    }
}
