<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeRestriction extends Model
{
    protected $fillable = [
        'name',
    ];

    public function game()
    {
        return $this->hasMany(Game::class);
    }

    public static function getageRestrictionList()
    {
        return self::pluck('name', 'id')->toArray();
    }
}
