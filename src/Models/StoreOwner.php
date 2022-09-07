<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class StoreOwner extends Model
{
    protected $table = 'store_owners';
    protected $fillable = [
    			'store_id',
				'user_id',
				];

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::created(function($model)
        {
	        $user=getUserDetail();
	        $store_name = (isset($model->store) && isset($model->store->store_name)) ? $model->store->store_name : '';
	        $store_id = (isset($model->store) && isset($model->store->id)) ? $model->store->id : '';
            $msg = 'Store Owner Created: '. $user['role'] . ' (' . $user['name'] . '-' . $user['id'] .') created a store owner for store '.$store_name.' - Id '.$store_id.' | store owner id(user_id): '.$model->user_id.'| first_name: '.$model->user->first_name.'| last_name: '.$model->user->last_name.'| address: '.$model->user->address1.'| email: '.$model->user->email.'| phone_no: '.$model->user->phone_no.'| post_code: '.$model->user->post_code.'';
            Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
        });
    }

	public function user()
	{
		return $this->hasOne('App\User','id','user_id');
	}

	public function store()
	{
		return $this->hasOne(Store::class,'id','store_id');
	}
}
