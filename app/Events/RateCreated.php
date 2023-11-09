<?php
<<<<<<< HEAD
//use Illuminate\Queue\SerializesModels;
//use Illuminate\Foundation\Events\Dispatchable;
//use Illuminate\Broadcasting\InteractsWithSockets;
//
//class RateCreated
//{
//    use Dispatchable, InteractsWithSockets, SerializesModels;
//
//    public $rate;
//
//    public function __construct($rate)
//    {
//        $this->rate = $rate;
//    }
//}
=======
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
>>>>>>> f2c7389ac3cb13c8ba21f3c2ee2c19c43e10fea7
