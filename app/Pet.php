<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    public function human()
    {
        return $this->belongsTo(User::class);
    }

}
