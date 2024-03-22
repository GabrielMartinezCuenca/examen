<?php
namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Book;
use App\Models\Writer;

class CreateBookEvent
{
    use Dispatchable, SerializesModels;

    public $book;
    public $writer;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Book  $book
     * @param  \App\Models\Writer  $writer
     * @return void
     */
    public function __construct(Book $book, Writer $writer)
    {
        $this->book = $book;
        $this->writer = $writer;
    }
}
