<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Tj extends Model
{
    protected $guarded = ['id'];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
