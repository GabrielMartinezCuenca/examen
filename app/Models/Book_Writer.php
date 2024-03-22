<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book_Writer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    public function writer(): BelongsTo
    {
        return $this->belongsTo(Writer::class);
    }

}
