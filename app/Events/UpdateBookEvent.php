<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Book;
use App\Models\Writer;


class UpdateBookEvent
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
