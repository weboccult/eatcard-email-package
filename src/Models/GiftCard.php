<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Illuminate\Database\Eloquent\Model;
use Weboccult\EatcardCompanion\Traits\Translatable;
use function Weboccult\EatcardMailCompanion\Helpers\getCachedImagePath;
use function Weboccult\EatcardMailCompanion\Helpers\getS3File;

class GiftCard extends Model
{
    use Translatable;

    protected $guarded = [];

    protected $appends = [
        'gift_price',
    ];

    public $translatableFields = [
        'name',
        'description',
    ];


    /**
     * @return string
     */
    public function getGiftPriceAttribute(): string
    {
        return number_format((float) $this->price, 2, ',', '');
    }
}
