<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Illuminate\Database\Eloquent\Model;


class Card extends Model
{
	protected $table = 'cards';
    protected $fillable = ['customer_id', 'card_id', 'store_id', 'status', 'total_points', 'file_id'];

    public function store()
	{
		return $this->hasOne(Store::class , 'id' , 'store_id');
	}

	public function customer()
	{
		return $this->hasOne(User::class , 'id' , 'customer_id');
	}

	public function store_owner()
	{
			return $this->belongsTo(StoreOwner::class , 'store_id' , 'store_id');
	}

	public function store_manager()
	{
			return $this->belongsTo(StoreManager::class , 'store_id' , 'store_id');
	}

	public function card_history()
	{
		return $this->hasMany(CardHistory::class, 'card_id', 'id');
	}
}
