<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = ['id'];

    public function house()
    {
        return $this->belongsTo('App\House');
    }
}
