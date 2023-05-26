<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
        'name',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public static function getPublisherList()
    {
        return self::pluck('name', 'id')->toArray();
    }
}
