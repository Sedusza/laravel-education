<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function ageRestriction()
    {
        return $this->belongsTo(AgeRestriction::class);
    }
}
