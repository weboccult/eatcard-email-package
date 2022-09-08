<?php

namespace Weboccult\EatcardMailCompanion\Traits;


use Weboccult\EatcardMailCompanion\Models\PaymentDetail;

trait PaymentTable
{
    /**
     * @return mixed
     */
    public function paymentTable()
    {
        return $this->morphMany(PaymentDetail::class, 'paymentable');
    }
}
