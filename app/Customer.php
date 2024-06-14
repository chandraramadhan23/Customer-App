<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function($model) {
            $model->user_id = self::generateUserId();
        });
    }

    private static function generateUserId()
    {
        $datePrefix = date('dmY');
        $lastCustomer = self::where('user_id', 'like', $datePrefix . '%')
                            ->orderBy('user_id', 'desc')
                            ->first();

        if (!$lastCustomer) {
            return $datePrefix . '001';
        }

        $lastIncrement = (int)substr($lastCustomer->user_id, -3);
        $newIncrement = str_pad($lastIncrement + 1, 3, '0', STR_PAD_LEFT);

        return $datePrefix . $newIncrement;
    }
}
