<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Meal extends Model
{

//    use SoftDeletes;

    protected $fillable = ['name', 'store_id', 'order_id', 'meal_image', 'description', 'time_limit', 'is_meal_res', 'is_week_meal_res', 'status','payment_type', 'price', 'is_default'];
	protected $appends = ['time_limit_hour', 'user_payment_type'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
	        $user=getUserDetail();
	        $store_name = (isset($model->store) && isset($model->store->store_name)) ? $model->store->store_name : '';
            $msg = 'Meal Created: ' . $user['role'] . ' (' . $user['name'] . '-' . $user['id'] . ') created a meal ' . $model->name . ' | id-' . $model->id . ' for the store ' . $store_name . '';
            Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
        });

        static::deleted(function ($model) {
	        $user=getUserDetail();
	        $store_name = (isset($model->store) && isset($model->store->store_name)) ? $model->store->store_name : '';
            $msg = 'Meal Deleted: ' . $user['role'] . ' (' . $user['name'] . '-' . $user['id'] . ') delete a meal ' . $model->name . ' | id-' . $model->id . ' for the store ' . $store_name . '';
            Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
        });

        static::updated(function ($model) {
            $dirty = $model->getDirty();
            if (!empty($dirty)) {
	            $user=getUserDetail();
	            $store_name = (isset($model->store) && isset($model->store->store_name)) ? $model->store->store_name : '';
                foreach ($dirty as $field => $newdata) {
                    $olddata = $model->getOriginal($field);
                    $oldData['old'][$field] = $olddata;
                    $newData['new'][$field] = $newdata;
                }
                $msg = 'Meal Updated: ' . $user['role'] . ' (' . $user['name'] . '-' . $user['id'] . ') updated a meal ' . $model->name . ' | id-' . $model->id . ' for the store ' . $store_name . '. ' . print_r($oldData, true) . ' => ' . print_r($newData, true) . '';
                Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
            }
        });

    }

	public function getTimeLimitHourAttribute($value)
	{
		$hours = intdiv($this->time_limit, 60).':'. ($this->time_limit % 60);
		return $hours;
    }
	public function getUserPaymentTypeAttribute($value)
	{
		$paymentType = '';
		if($this->payment_type == 1) {
			$paymentType = __('messages.full_payment');
		}
		elseif ($this->payment_type == 3) {
			$paymentType = __('messages.partial_payment');
		}
		return $paymentType;
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }

	public function todayReservations()
	{
		$today = Carbon::now()->format('Y-m-d');
		return $this->hasMany(StoreReservation::class, 'meal_type')->where('res_date', $today);
    }
	public function last30DaysReservations()
	{
		$today = Carbon::now()->format('Y-m-d');
		$prev_date = Carbon::now()->subDays(30)->format('Y-m-d');
		return $this->hasMany(StoreReservation::class, 'meal_type')->where('res_date', '<=', $today)->where('res_date', '>=', $prev_date);
    }
}
