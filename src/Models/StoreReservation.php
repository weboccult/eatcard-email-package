<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Weboccult\EatcardCompanion\Helpers\getDutchDate;
use function Weboccult\EatcardMailCompanion\Helpers\getDutchDateTable;
use Weboccult\EatcardMailCompanion\Traits\PaymentTable;

class StoreReservation extends Model
{
    use SoftDeletes;
    use PaymentTable;

    protected $table = 'store_reservations';

    protected $guarded = [];

    protected $appends = ['dutch_date'];

    /**
     * @return array|mixed
     */
    public function getReservationDateAttribute()
    {
        return $this->getRawOriginal('res_date');
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getResDateAttribute($value): string
    {
        return getDutchDate($value);
    }

	/**
	 * @param $value
	 * @return string
	 */
	public function getDutchDateAttribute($value)
	{
		return getDutchDateTable($this->created_at);
	}

    /**
     * @return BelongsToMany
     */
    public function tables2(): BelongsToMany
    {
        return $this->belongsToMany(Table::class, 'reservation_tables', 'reservation_id', 'table_id');
    }

    public function meal(): HasOne
    {
        return $this->hasOne(Meal::class, 'id', 'meal_type');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
