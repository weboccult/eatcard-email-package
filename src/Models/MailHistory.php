<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class MailHistory extends Model
{
    use HasFactory;

	protected $connection = 'mongodb';

	protected $collection = 'mail_history';
}
