<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Client extends Model
{
    public function interlocuteurs(): MorphMany
    {
        return $this->morphMany(Interlocuteur::class, 'interlocuteurable');
    }
}
