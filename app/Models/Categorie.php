<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'name',
    ];

    public function game()
    {
        return $this->hasMany(Game::class);
    }

    public static function getCategorieList()
    {
        return self::pluck('name', 'id')->toArray();
    }
}
