<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Storage extends Model
{
    protected $table = 'g40_storages';

    public $timestamps = false;

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'owner', 'citizenid');
    }
}
