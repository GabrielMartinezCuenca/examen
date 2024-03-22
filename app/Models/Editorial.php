<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Editorial extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'deleted_at'];

    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }

}