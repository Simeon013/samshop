<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot(){

        parent::boot();

        self::creating(function ($order) {
            $order->user()->associate(auth()->user()->id);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
