<?php
/**
 * Created by PhpStorm.
 * User: wot-fenil
 * Date: 4/8/22
 * Time: 3:26 PM
 */

namespace Weboccult\EatcardMailCompanion\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Weboccult\EatcardMailCompanion\EatcardMailCompanion;
use Weboccult\EatcardMailCompanion\Models\GiftPurchaseOrder;
use Weboccult\EatcardMailCompanion\Models\Order;
use Weboccult\EatcardMailCompanion\Models\OrderHistory;
use Weboccult\EatcardMailCompanion\Models\StoreReservation;
use Illuminate\Contracts\View\View;

if(!function_exists('eatcardMailSend')) {

	/**
	 * @return EatcardMailCompanion
	 */
	function eatcardMailSend() {
		return app(EatcardMailCompanion::class);
	}
}

if(!function_exists('getOrderDetail')) {
	/**
	 * @param $order_id
	 */
	function getOrderDetail($order_id) {
		$order = Order::query()->where('id', $order_id)->first();
		if(empty($order)) {
			$order = OrderHistory::query()->where('id', $order_id)->first();
		}
		return $order;
	}
}

if(!function_exists('getReservationDetail')) {
	/**
	 * @param $reservation_id
	 * @return mixed
	 */
	function getReservationDetail($reservation_id) {
		return StoreReservation::query()->with('meal')->where('id', $reservation_id)->first();
	}
}

if(!function_exists('getGiftCouponOrderDetail')) {
	/**
	 * @param $gift_coupon_id
	 * @return mixed
	 */
	function getGiftCouponOrderDetail($gift_coupon_id) {
		return GiftPurchaseOrder::query()->where('id', $gift_coupon_id)->first();
	}
}

if (! function_exists('__mailCompanionViews')) {

	/**
	 * @param string $path
	 * @param $data
	 *
	 * @return EatcardMailCompanion
	 */
	function __mailCompanionViews(string $path, $data = null): View
	{
		try {
			$view = view('eatcard-mail-companion::'.$path);
			foreach ($data as $k => $v) {
				$view->with($k, $v);
			}
			return $view;
		} catch (\Exception $e) {
			Log::error('Error on email template view function : Message : '.$e->getMessage().' | Line :'.$e->getLine() .' | File : '.$e->getFile());
		}
	}
}

if (! function_exists('appDutchDate')) {
	/**
	 * @param $date
	 *
	 * @return string
	 */
	function appDutchDate($date): string
	{
		$dutchDayNames = [
			'Sunday' => 'Zo',
			'Monday' => 'Ma',
			'Tuesday' => 'Di',
			'Wednesday' => 'Wo',
			'Thursday' => 'Do',
			'Friday' => 'Vr',
			'Saturday' => 'Za',
		];
		return $dutchDayNames[Carbon::parse($date)->format('l')].' '.Carbon::parse($date)->format('d-m-y');
	}
}

if(!function_exists('getDutchDate')) {
	function getDutchDate($date, $day2let = false)
	{
		$dutchDayNames = [
			'Sunday' => 'zondag',
			'Monday' => 'maandag',
			'Tuesday' => 'dinsdag',
			'Wednesday' => 'woensdag',
			'Thursday' => 'donderdag',
			'Friday' => 'vrijdag',
			'Saturday' => 'zaterdag'
		];


		$monthNames = [
			"January" => "januari",
			"February" => "februari",
			"March" => "maart",
			"April" => "april",
			"May" => "mei",
			"June" => "juni",
			"July" => "juli",
			"August" => "augustus",
			"September" => "september",
			"October" => "oktober",
			"November" => "november",
			"December" => "december",
		];
		$day = $day2let ? appDutchDate(Carbon::parse($date)->format('l')) : $dutchDayNames[Carbon::parse($date)->format('l')];
		return $day. ' ' . Carbon::parse($date)->format('d') . ' ' .
			$monthNames[Carbon::parse($date)->format('F')] . ' ' .
			Carbon::parse($date)->format('Y');
	}
}
