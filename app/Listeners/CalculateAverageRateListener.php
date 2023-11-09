<?php
<<<<<<< HEAD
//use App\Events\RateCreated;
//
//class CalculateAverageRateListener
//{
//    public function handle(RateCreated $event)
//    {
//        $rate = $event->rate;
//
//        // Tính điểm đánh giá trung bình và cập nhật vào cột rate_avg trong bảng Documents
//        $document = Document::find($rate->document_id);
//        $avgRate = $document->rates()->avg('rates');
//        $document->rate = $avgRate;
//        $document->save();
//    }
//}
=======
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
>>>>>>> f2c7389ac3cb13c8ba21f3c2ee2c19c43e10fea7
