<?php

namespace App\Listeners;

use App\Models\Book_Writer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateBookWriter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Book_Writer::create(
            ['book_id' => $event->book->id,
            'writer_id' => $event->writer->id
            ]
        );
    }
}
