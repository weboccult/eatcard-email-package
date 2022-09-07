<?php

namespace Weboccult\EatcardMailCompanion\Models;

use App\Models\StorePosImage;
use App\Scopes\GoogleStoreScope;
use App\StoreLanguage;
use App\StoreSetting;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\CardHistory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Weboccult\EatcardMailCompanion\Classes\ImageFilters;

class Store extends Model
{
    use SoftDeletes;

    protected $table = 'stores';
    protected $fillable = [

        'created_by',
        'store_name',
        'store_slug',
        'company_name',
        'kvk_number',
        'btw_number',
        'address',
        'zipcode',
        'store_street',
        'store_region',
        'store_country',
        'store_email',
        'store_phone',
        'point_value',
        'per_point',
        'is_inactive_mail',
        'inactive_mail_message',
        'is_birthday_notification',
        'birthday_notification_message',
        'package_id',
        'status',
        'page_logo',
        'banner_img',
        'store_city',
        'inactive_days',
        'privacy_url',
        'is_reservation',
        'max_per_table',
        'reservation_msg',
        'reservation_off',
        'booking_off_time',
        'is_booking_enable',
        'booking_till_bfre_msg',
        'booking_till_aftr_msg',
        'free_point_on_reg',
        'reminder_time',
        'is_email_reminder_enable',
        'booking_default_msg',
        'on_date_default_msg',
        'reservation_off_chkbx',
        'auto_approval',
        'auto_approve_members',
        'auto_approve_condition', // for checkbox feature on pause reservation
        'website_url',
        'is_check_mailchimp',
        'mailchimp_api_key',
        'mailchimp_list_id',
        'display_canceled_res',
        'expired_on', // store expired date,
        'is_loyalty_enabled',
        'is_table_mgt_enabled',
        'person_per_point',
        'free_point_on_res',
        'is_check_in_mail',
        'is_claim_point_expire',
        'claim_point_expire_hour',
        'is_auto_claim_points',
        'is_last_round',
        'last_round_min',
        'is_bill_time',
        'bill_time_min',
        'booking_frame_color',
        'double_check_email',
        'on_res_success_msg',
        'is_booking_till_bfre_msg',
        'is_booking_default_msg',
        'is_date_default_msg',
        'is_res_success_msg',
        'is_user_cancel_res',
        'user_cancel_res_time',
        'owner_max_per_table',
        'display_not_checkin_res',
        'is_smart_res',
        'is_smart_fit',
        'auto_approve_booking_with_comment',
        'allow_auto_group',
        'allow_review',
        'review_hour',
        'facebook_url',
        'instagram_url',
        'store_latitude',
        'store_longitude',
        'google_place_id',
        'is_check_takeaway',
        'is_auto_print_takeaway',
        'is_check_mollie',
        'mollie_api_key',
        'is_manual_check',
        'manual_check_msg',
        'manual_check_required',
        'display_end_time',
        'display_section_frontend',
        'takeaway_review_hour',
        'allow_butler',
        'butler_hour',
        'is_reservation_info_enable',
        'reservation_info',
        'allow_qr_code',
        'qr_code',
        'is_notification',
        'is_take_out',
        'is_dine_in',
        'is_cash_payment',
        'is_pin_payment',
        'app_pos_print',
        'is_kiosk_enable',
        'kiosk_data',
        'butler_data',
        'is_menu_enable',
        'sms_settings',
        'is_sms_enabled',
        'is_delivery_app_enabled',
        'is_uber_eats',
        'is_google_store',
        'show_order_transaction_detail',
        'future_order_print_status',
        'future_order_print_time',
        'ignore_arrangement_time',
        'ignore_table_availability',
        'show_supplement_kitchen_name',
        'is_res_checkout_confirmation',
        'show_checkout_confirmation',
        'ignore_table_availability',
        'is_ftp',
        'ezora_hide_fields',
        'ftp_server_type',
        'ftp_connection',
        'ftp_username',
        'ftp_password',
        'ftp_path',
        'ftp_port',
        'is_no_show_confirmation',
        'is_ayce_reservation',
        'is_checkout_res_with_revenue',
        'is_infinite_scroll',
        'is_anyone_modify_cart',
        'is_cancel_no_show_confirmation',
        'is_check_deliveroo',
        'deliveroo_api_key',
        'deliveroo_api_token',
        'direct_discount_type',
        'is_grab_and_go',
        'is_dine_in_announcement',
        'dine_in_announcement',
        'is_reservation_tickets_enable',
        'reservation_tickets_data',
        'tickets_qr_enable',
        'auto_update_res_time',
        'is_update_from_time_on_check_in',
        'is_ticket_announcement',
        'ticket_announcement_content',
    ];

    protected $appends = [
        'total_cards_count', 'total_activated_cards_count', 'email_page_logo'
    ];

    protected $dates = ['deleted_at'];
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('is_google_store', function (Builder $builder) {
            $storeIds = [];
            if (auth()->check()){
                if(auth()->user()->hasRole('store_owner'))
                    $storeIds = StoreOwner::where('user_id', auth()->id())->pluck('store_id')->toArray();
                else if (auth()->user()->hasRole('store_manager'))
                    $storeIds = StoreManager::where('user_id', auth()->id())->pluck('store_id')->toArray();
            }
            $builder->where('is_google_store', 0)->orWhereIn('id', $storeIds);
        });

        static::created(function ($model) {
            $user=getUserDetail();
            $msg = 'Store Created: ' . $user['role'] . ' (' . $user['name'] . '-' . $user['id'] . ') created a Store ' . $model->store_name . ' | id-' . $model->id . '';
            Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
        });

        static::deleted(function ($model) {
            $user=getUserDetail();
            $msg = 'Store Deleted: ' . $user['role'] . ' (' . $user['name'] . '-' . $user['id'] . ') delete a Store ' . $model->store_name . ' | id-' . $model->id . '';
            Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
        });

        static::saved(function ($model) {
            $dirty = $model->getDirty();
            if (!empty($dirty)) {
	            $user=getUserDetail();
                foreach ($dirty as $field => $newdata) {
                    $olddata = $model->getOriginal($field);
                    $oldData['old'][$field] = $olddata;
                    $newData['new'][$field] = $newdata;
                }
                $msg = 'Store Updated: ' . $user['role'] . ' (' . $user['name'] . '-' . $user['id'] . ') updated a Store ' . $model->store_name . ' | id-' . $model->id . '  ' . print_r($oldData, true) . ' => ' . print_r($newData, true) . '';
                Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
            }
        });
    }

    public function getEmailPageLogoAttribute()
    {
        if ($this->page_logo) {
            return ImageFilters::applyFilter('EmailStoreLogo', $this->page_logo);
        }
    }

    public function getTotalCardsCountAttribute()
    {
        return Card::where('store_id', $this->id)->count();
    }

    public function getTotalActivatedCardsCountAttribute()
    {
        return Card::where('store_id', $this->id)->where('status', 'active')->count();
    }

    public function getTotalUsagesAttribute()
    {
        $cardIds = Card::where('store_id', $this->id)->pluck('id');
        $count = CardHistory::whereIn('card_id', $cardIds)->count();
        return $count;
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function store_owner()
    {
        return $this->hasOne(StoreOwner::class, 'store_id', 'id');
    }
    public function notificationSetting()
    {
        return $this->hasOne(NotificationSetting::class, 'store_id', 'id');
    }

    public function storeLanguage()
    {
        return $this->hasOne(StoreLanguage::class, 'store_id', 'id');
    }
    public function sqs()
    {
        return $this->hasOne(StoreSqs::class, 'store_id', 'id');
    }

    public function takeawaySetting()
    {
        return $this->hasOne(TakeawaySetting::class, 'store_id', 'id');
    }

    public function store_manager()
    {
        return $this->hasOne(StoreManager::class, 'store_id', 'id');
    }

    public function storeSetting()
    {
        return $this->hasOne(StoreSetting::class, 'store_id', 'id');
    }

    public function StoreThuisbezorgd()
    {
        return $this->hasOne(StoreThuisbezorgd::class, 'store_id', 'id');
    }

    public function storeButler()
    {
        return $this->hasOne(StoreButler::class, 'store_id', 'id');
    }

    public function multiSafe()
    {
        return $this->hasOne(MultiSafePay::class, 'store_id', 'id');
    }

    public function untillSetting()
    {
        return $this->hasOne(StoreUntillSetting::class, 'store_id', 'id');
    }

    public function giftSetting()
    {
        return $this->hasOne(GiftCardSetting::class, 'store_id', 'id');
    }

    public function store_files()
    {
        return $this->hasMany(StoreFile::class, 'store_id', 'id');
    }

    public function cards()
    {
        return $this->hasMany(Card::class, 'store_id', 'id');
    }
    public function kioskDevices()
    {
        return $this->hasMany(KioskDevice::class, 'store_id', 'id');
    }

    public function banner_image()
    {
        return $this->hasMany(StoreBannerImage::class, 'store_id', 'id');
    }
    public function horizontal_image()
    {
        return $this->hasMany(StoreHorizontalImage::class, 'store_id', 'id');
    }
    public function vertical_image()
    {
        return $this->hasMany(StoreVerticalImage::class, 'store_id', 'id');
    }
    public function dine_in_image()
    {
        return $this->hasMany(StoreDineInImage::class, 'store_id', 'id');
    }
    public function pos_image()
    {
        return $this->hasMany(StorePosImage::class, 'store_id', 'id');
    }
    public function kiosk_banner_images()
    {
        return $this->hasMany(KioskBannerImage::class, 'store_id', 'id');
    }
    public function kiosk_slider_images()
    {
        return $this->hasMany(KioskSliderImage::class, 'store_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(StoreReservation::class, 'store_id', 'id');
    }

    public function getMealType($meal_id)
    {
        $meal = Meal::where('id', $meal_id)->first();
        if (isset($meal) && !empty($meal)) {
            return (isset($meal->name) && $meal->name != '') ? $meal->name : '';
        } else {
            return '';
        }
    }

    public function getReservationOffDates($store)
    {
        if ($store->reservation_off != 0) {

            $today = Carbon::now();
            $from = Carbon::createFromDate($today->format('Y'), $today->format('m'), $today->format('d'));

            $tillDay = Carbon::now()->addDay($store->reservation_off - 1);
            $to = Carbon::createFromDate($tillDay->format('Y'), $tillDay->format('m'), $tillDay->format('d'));

            return $this->generateDateRange($from, $to);
        }
        return [];
    }

    private function generateDateRange(Carbon $start_date, Carbon $end_date)
    {
        $dates = [];
        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('d');
        }
        return $dates;
    }

    public function getBookingOffDates($store)
    {
        if ($store->reservation_off != 0) {

            $today = Carbon::now();
            $from = Carbon::createFromDate($today->format('Y'), $today->format('m'), $today->format('d'));

            $tillDay = Carbon::now()->addDay($store->reservation_off - 1);
            $to = Carbon::createFromDate($tillDay->format('Y'), $tillDay->format('m'), $tillDay->format('d'));

            return $this->generateBookingDateRange($from, $to);
        }
        return [];
    }

    private function generateBookingDateRange(Carbon $start_date, Carbon $end_date)
    {
        $dates = [];
        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('m/d/Y');
        }
        return $dates;
    }

    public function sections()
    {
        return $this->hasMany(DiningArea::class, 'store_id');
    }

    public function printers()
    {
        return $this->hasMany(StorePrinter::class, 'store_id');
    }

    public function products() {
        return $this->hasMany(Product::class,'store_id');
    }

    public function supplements() {
        return $this->hasMany(Supplement::class,'store_id');
    }

    public function storePosSetting() {
        return $this->hasMany(StorePosSetting::class,'store_id');
    }
    public function StoreUberEats()
    {
        return $this->hasOne(StoreUberEatsSetting::class, 'store_id', 'id');
    }

    public function meals() {
        return $this->hasMany(Meal::class,'store_id');
    }

	public function ReservationTicketsBannerAndSliderImage()
	{
		return $this->hasMany(ReservationTicketsBannerAndSliderImage::class, 'store_id', 'id');
	}
}
