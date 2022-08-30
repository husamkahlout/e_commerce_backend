<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'code', 'type', 'value', 'percent_off', 'start_date', 'end_date', 'repeat_usage'
    ];

    public static function findByCode($code) {
        return self::where('code', $code)->first();
    }

    public function discount($total) {
        if($this->type == 'value') {
            return $this->value;
        } elseif ($this->type == 'percent_off') {
            return round(($this->percent_off / 100) * $total);
        } else {
            return 0;
        }
    }
}