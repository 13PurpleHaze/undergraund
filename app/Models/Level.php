<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    public function poems()
    {
        return $this->hasMany(Poem::class, 'level_id', 'id');
    }
}
