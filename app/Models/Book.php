<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function editorial(): BelongsTo
    {
        return $this->belongsTo(Editorial::class);
    }


    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    public function book_writer(): HasMany
    {
        return $this->hasMany(Book_Writer::class);
    }

}
