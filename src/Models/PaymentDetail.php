<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paymentDetail(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return BelongsTo
     */
    public function kiosk(): BelongsTo
    {
        return $this->belongsTo(KioskDevice::class, 'kiosk_id', 'id');
    }

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(StoreReservation::class, 'paymentable_id');
    }
}
