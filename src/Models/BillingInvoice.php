<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingInvoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_number', 'user_id', 'total_amount', 'month', 'year', 'invoice_url'];

    protected $appends = ['user_amount'];

    public function getUserAmountAttribute()
    {
        return number_format((float)$this->total_amount, 2, ',', '');
    }
}
