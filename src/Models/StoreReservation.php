<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Weboccult\EatcardCompanion\Traits\PaymentTable;
use function Weboccult\EatcardCompanion\Helpers\getDutchDate;
use function Weboccult\EatcardMailCompanion\Helpers\getDutchDateTable;

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
     * @return BelongsTo
     */
    public function dineInPrice(): BelongsTo
    {
        return $this->belongsTo(DineinPrices::class, 'dinein_price_id')->with(['dineInCategory']);
    }

    /**
     * @return HasMany
     */
    public function tables(): HasMany
    {
        return $this->hasMany(ReservationTable::class, 'reservation_id');
    }

    /**
     * @return BelongsToMany
     */
    public function tables2(): BelongsToMany
    {
        return $this->belongsToMany(Table::class, 'reservation_tables', 'reservation_id', 'table_id');
    }

    /**
     * @return HasMany
     */
    public function activeServeRequests(): HasMany
    {
        return $this->hasMany(ReservationServeRequest::class, 'reservation_id')->where('is_served', '<>', 1);
    }

    public function meal(): HasOne
    {
        return $this->hasOne(Meal::class, 'id', 'meal_type');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rounds(): HasMany
    {
        return $this->hasMany(ReservationOrderItem::class, 'reservation_id')->orderBy('round');
    }

    public function reservation_serve_requests()
    {
        return $this->hasMany(ReservationServeRequest::class, 'reservation_id');
    }

    /**
     * @return BelongsTo
     */
    public function kiosk(): BelongsTo
    {
        return $this->belongsTo(KioskDevice::class, 'kiosk_id', 'id');
    }
}
