<?php

namespace App\Listeners;

use App\Events\RateCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UpdateAverageRate implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(RateCreated $event)
    {
        $rate = $event->rate;
        $document_id = $rate->document_id;

        // Tính toán lại trung bình điểm và cập nhật rate_avg
        $averageRate = DB::table('rates')
            ->where('document_id', $document_id)
            ->avg('rates');

        DB::table('documents')
            ->where('id', $document_id)
            ->update(['rate' => $averageRate]);
    }
}
