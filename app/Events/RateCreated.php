<?php
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class RateCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $rate;

    public function __construct($rate)
    {
        $this->rate = $rate;
    }
}
