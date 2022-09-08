<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Table extends Model
{

//    use SoftDeletes;

	protected $fillable = [
		'dining_area_id',
		'name',
		'no_of_seats',
		'qr_code',
		'status',
        'table_type',
        'order',
        'no_of_min_seats',
        'online_status'
	];

	protected static function boot()
	{
		parent::boot();
		static::created(function ($model) {
			$user=getUserDetail();
			$msg = 'Table Created: ' . $user['role'] . ' (' . $user['name'] . '-' . $user['id'] . ') created a Table ' . $model->name . ' | id-' . $model->id . ' for the dining_area ' . $model->dining_area_id . '';
			Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
		});
		static::deleted(function ($model) {
			$user=getUserDetail();
			$msg = 'Table Deleted: ' . $user['role'] . ' (' . $user['name'] . '-' . $user['id'] . ') delete a Table ' . $model->name . ' | id-' . $model->id . ' for the dining_area ' . $model->dining_area_id . '';
			Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
		});
		static::updated(function ($model) {
			$dirty = $model->getDirty();
			if (!empty($dirty)) {
				$user=getUserDetail();
				foreach ($dirty as $field => $newdata) {
					$olddata = $model->getOriginal($field);
					$oldData['old'][$field] = $olddata;
					$newData['new'][$field] = $newdata;
				}
				$msg = 'Table Updated: ' . $user['role'] . ' (' . $user['name'] . '-' . $user['id'] . ') updated a Table ' . $model->name . ' | id-' . $model->id . ' for the dining_area ' . $model->dining_area_id . '. ' . print_r($oldData, true) . ' => ' . print_r($newData, true) . '';
				Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
			}
		});
	}

	public function reservations()
	{
		return $this->hasMany(ReservationTable::class, 'table_id');
	}

	public function diningArea()
	{
		return $this->belongsTo(DiningArea::class, 'dining_area_id');
	}
}
