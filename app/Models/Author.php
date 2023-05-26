<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
    ];

    public function author()
    {
        return $this->hasMany(Game::class);
    }

    public static function getAuthorList()
    {
        return self::pluck('name', 'id')->toArray();
    }
}
