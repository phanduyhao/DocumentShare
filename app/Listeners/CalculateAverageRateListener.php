<?php
use App\Events\RateCreated;

class CalculateAverageRateListener
{
    public function handle(RateCreated $event)
    {
        $rate = $event->rate;

        // Tính điểm đánh giá trung bình và cập nhật vào cột rate_avg trong bảng Documents
        $document = Document::find($rate->document_id);
        $avgRate = $document->rates()->avg('rates');
        $document->rate = $avgRate;
        $document->save();
    }
}
