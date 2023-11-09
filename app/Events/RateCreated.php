<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RateCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $rate;

    public function __construct($rate)
    {
        $this->rate = $rate;
    }
}
