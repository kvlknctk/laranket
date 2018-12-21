<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;
    protected $fillable  = ['title', 'poll_id'];


    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function poll()
    {
        return $this->belongsTo('App\Poll');
    }
}
