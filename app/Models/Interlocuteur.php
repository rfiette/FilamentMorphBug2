<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Interlocuteur extends Model
{
    public function interlocuteurable(): MorphTo
    {
        return $this->morphTo();
    }
}
