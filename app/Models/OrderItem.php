<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public function game()
    {
        return $this->hasMany(Game::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}


