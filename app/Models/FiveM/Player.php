<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Player extends Model
{
    protected $table = 'players';
    
    public $timestamps = false; 

    /**
     * Solusi MassAssignmentException:
     * Mendaftarkan kolom yang diizinkan untuk diubah melalui metode update().
     */
    protected $fillable = [
        'citizenid',
        'cid',
        'license',
        'name',
        'money',
        'charinfo',
        'job',
        'gang',
        'position',
        'metadata',
        'inventory',
        'last_updated',
    ];

    protected $casts = [
        'charinfo' => 'json',
        'metadata' => 'json',
        'money' => 'json',
        'position' => 'json',
        'inventory' => 'json',
        'job' => 'json',
        'gang' => 'json',
        'last_updated' => 'datetime',
    ];

    public function storages(): HasMany
    {
        return $this->hasMany(Storage::class, 'owner', 'citizenid');
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(PlayerVehicle::class, 'citizenid', 'citizenid');
    }

    /**
     * Menentukan apakah pemain sedang aktif/online.
     * Update: Sekarang menggunakan interval 1 menit sesuai permintaan tracker.
     */
    public function getIsActiveAttribute(): bool
    {
        if (!$this->last_updated) {
            return false;
        }

        return $this->last_updated->gt(now()->subMinutes(15));
    }
}