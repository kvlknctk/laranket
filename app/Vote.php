<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
    use SoftDeletes;
    protected $fillable = ['ip', 'option_id'];

    public function option()
    {
        return $this->belongsTo('App\Option');
    }
}
