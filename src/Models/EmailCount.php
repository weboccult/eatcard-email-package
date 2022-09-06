<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Illuminate\Database\Eloquent\Model;

class EmailCount extends Model
{
    protected $fillable = ['date', 'success_count', 'error_count'];
}
