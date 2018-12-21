<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
    use SoftDeletes;

    protected $fillable =  ['title', 'state_id'];

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function options()
    {
        return $this->hasMany('App\Option')->withCount('votes');
    }

    public function votes()
    {
        return $this->hasManyThrough('App\Vote', 'App\Option');
    }

}
