<?php
/**
 * Created by PhpStorm.
 * User: wot-fenil
 * Date: 17/8/22
 * Time: 2:06 PM
 */

namespace Weboccult\EatcardMailCompanion\Helpers;

use Carbon\Carbon;
use Weboccult\EatcardMailCompanion\Models\EmailCount;

if(!function_exists('getS3File')) {
	/**
	 * @param $path
	 * @return string
	 */
	function getS3File($path) {
		if ($path) {
			return $path;
		} else {
			return config('eatcardMailCompanion.AWS_URL') . 'assets/no_image.png';
		}
	}
}

if(!function_exists('getCachedImagePath')) {
	/**
	 * @param $path
	 * @return string
	 */
	function getCachedImagePath($path)
	{
		if ($path) {
			$url = parse_url($path);
			return $url['path'];
		} else {
			return '';
		}
	}
}

if(!function_exists('changePriceFormat')) {
	/**
	 * @param $val
	 * @return string
	 */
	function changePriceFormat($val){
		return ($val) ? number_format((float)$val, 2, ',', '') : '0,00';
	}
}

if(!function_exists('getDutchDateTable')) {
	/**
	 * @param $date
	 * @param bool $is_takeaway
	 * @return string
	 */
	function getDutchDateTable($date, $is_takeaway = false)
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

		if ($is_takeaway) {
			return $dutchDayNames[Carbon::parse($date)->format('l')] . ' (' .
				Carbon::parse($date)->format('d') . ' ' .
				$monthNames[Carbon::parse($date)->format('F')] . ')';
		}
		return $dutchDayNames[Carbon::parse($date)->format('l')] . ' ' .
			Carbon::parse($date)->format('d') . ' ' .
			$monthNames[Carbon::parse($date)->format('F')];
	}
}

if(!function_exists('updateEmailCount')) {
	/**
	 * @param $string : string
	 * @return bool
	 */
	function updateEmailCount($string)
	{
		$now = Carbon::now()->format('Y-m-d');
		$email_count = EmailCount::firstOrCreate(['date' => $now]);
		if ($string == 'success') {
			$email_count->update(['success_count' => (int)$email_count->success_count + 1]);
		}
		elseif ($string == 'error') {
			$email_count->update(['error_count' => (int)$email_count->error_count + 1]);
		}
		return true;
	}
}