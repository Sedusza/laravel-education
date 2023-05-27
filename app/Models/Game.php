<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Game extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
