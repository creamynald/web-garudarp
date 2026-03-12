<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerVehicle extends Model
{
    protected $table = 'player_vehicles';
    
    public $timestamps = false; 

    protected $fillable = [
        'license', 'citizenid', 'vehicle', 'hash', 'mods', 'plate', 'fakeplate', 
        'garage', 'fuel', 'engine', 'body', 'state', 'depotprice', 'damage', 
        'garage_id', 'mileage', 'balance', 'paymentamount', 'paymentsleft', 
        'financetime', 'parking', 'impound_data', 'impound', 'impound_retrievable',
        'glovebox', 'trunk'
    ];

    protected $casts = [
        'mods' => 'json',
    ];

    /**
     * Relasi ke Player berdasarkan citizenid.
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'citizenid', 'citizenid');
    }

    protected static function booted()
    {
        static::creating(function ($vehicle) {
            if (empty($vehicle->hash) && !empty($vehicle->vehicle)) {
                $vehicle->hash = self::generateJoaatHash($vehicle->vehicle);
            }

            $vehicle->mods = $vehicle->mods ?? '[]';
            $vehicle->damage = $vehicle->damage ?? '[]';
            $vehicle->glovebox = $vehicle->glovebox ?? '[]';
            $vehicle->trunk = $vehicle->trunk ?? '[]';
            $vehicle->impound_data = $vehicle->impound_data ?? '[]';

            $vehicle->state = $vehicle->state ?? 1;
            $vehicle->fuel = $vehicle->fuel ?? 100;
            $vehicle->engine = $vehicle->engine ?? 1000;
            $vehicle->body = $vehicle->body ?? 1000;
            $vehicle->mileage = $vehicle->mileage ?? 0;
            $vehicle->balance = $vehicle->balance ?? 0;
            $vehicle->paymentamount = $vehicle->paymentamount ?? 0;
            $vehicle->paymentsleft = $vehicle->paymentsleft ?? 0;
            $vehicle->financetime = $vehicle->financetime ?? 0;
            $vehicle->depotprice = $vehicle->depotprice ?? 0;
            $vehicle->impound = $vehicle->impound ?? 0;
            $vehicle->impound_retrievable = $vehicle->impound_retrievable ?? 0;
        });
    }

    /**
     * Jenkins One-at-a-Time hash (Joaat) untuk menyesuaikan dengan mesin GTA V.
     */
    public static function generateJoaatHash($string) {
        $string = strtolower($string);
        $hash = 0;
        for ($i = 0; $i < strlen($string); $i++) {
            $hash += ord($string[$i]);
            $hash += ($hash << 10);
            $hash ^= ($hash >> 6);
        }
        $hash += ($hash << 3);
        $hash ^= ($hash >> 11);
        $hash += ($hash << 15);
        
        return $hash & 0xFFFFFFFF;
    }
}