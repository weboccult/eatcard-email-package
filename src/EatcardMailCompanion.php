<?php

namespace Weboccult\EatcardMailCompanion;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Weboccult\EatcardCompanion\Enums\PrintMethod;
use Weboccult\EatcardCompanion\Enums\PrintTypes;
use function Weboccult\EatcardCompanion\Helpers\eatcardPrint;
use Weboccult\EatcardCompanion\Services\Common\Prints\Generators\PaidOrderGenerator;
use function Weboccult\EatcardMailCompanion\Helpers\getGiftCouponOrderDetail;
use function Weboccult\EatcardMailCompanion\Helpers\getOrderDetail;
use function Weboccult\EatcardMailCompanion\Helpers\getReservationDetail;
use Weboccult\EatcardMailCompanion\jobs\SendMailJob;
use Weboccult\EatcardMailCompanion\Models\GiftCard;
use Weboccult\EatcardMailCompanion\Models\MailJob;
use Weboccult\EatcardMailCompanion\Models\Store;
use function Weboccult\EatcardMailCompanion\Helpers\__mailCompanionViews;
use Weboccult\EatcardMailCompanion\Models\User;

class EatcardMailCompanion
{
	private string $entity_type = '';

	private $entity_id = null;

	private $entity_data;

	private $content;

	private string $subject = '';

	private array $payload = [];

	private string $recipient_email = '';

	private string $from_name = '';

	private string $bcc = '';

	private string $cc = '';

	private string $mail_type = '';

	private $store;

	private $gift_card;

	private string $qr_image;

	/**
	 * @param $entity_type
	 * @return EatcardMailCompanion
	 */
	public function entityType($entity_type): self
	{
		$this->entity_type = $entity_type;
		return $this;
	}

	public function payload($payload) : self
	{
		$this->payload = $payload;
		return $this;
	}

	/**
	 * @return EatcardMailCompanion
	 */
	public function template($template_name) : self
	{
		$this->entity_type = $template_name;
		$this->content = view('eatcard-mail-companion::'.$this->entity_type);
		return $this;
	}

	/**
	 * @param $entity_id
	 * @return EatcardMailCompanion
	 */
	public function entityId($entity_id): self
	{
		$this->entity_id = $entity_id;
		if($this->entity_type == 'order') {
			$this->entity_data = getOrderDetail($entity_id);
			$this->content = $this->getOrderContent();
		} elseif ($this->entity_type == 'reservation') {
			$this->entity_data = getReservationDetail($entity_id);
			$this->getReservationContent();
		} elseif ($this->entity_type == 'gift_purchase_order') {
			$this->entity_data = getGiftCouponOrderDetail($entity_id);
			$this->getGiftCouponContent();
		} elseif ($this->entity_type == 'user') {
			$this->getUserContent();
		} elseif ($this->entity_type == 'birthday_wish') {
			$user = $this->payload;
			$this->content = __mailCompanionViews('birthday_wish', [
				'user' => $user
			]);
		}
		return $this;
	}

	/**
	 * @param $subject
	 * @return EatcardMailCompanion
	 */
	public function subject($subject): self
	{
		$this->subject = $subject;
		return $this;
	}

	/**
	 * @param $recipients
	 * @return EatcardMailCompanion
	 */
	public function recipients($recipients): self
	{
		$this->recipients = $recipients;
		return $this;
	}

	/**
	 * @param $from_name
	 * @return EatcardMailCompanion
	 */
	public function fromName($from_name): self
	{
		$this->from_name = $from_name;
		return $this;
	}

	/**
	 * @param $bcc
	 * @return EatcardMailCompanion
	 */
	public function bcc($bcc): self
	{
		if(empty($bcc)) {
			$bcc = '';
		}
		$this->bcc = $bcc;
		return $this;
	}

	/**
	 * @param $cc
	 * @return EatcardMailCompanion
	 */
	public function cc($cc): self
	{
		if(empty($cc)) {
			$cc = '';
		}
		$this->cc = $cc;
		return $this;
	}

	/**
	 * @param $mail_type
	 * @return EatcardMailCompanion
	 */
	public function mailType($mail_type) : self
	{
		$this->mail_type = $mail_type;
		return $this;
	}

	public function dispatch()
	{
		try {
			$mail_data['entity_type'] = $this->entity_type;
			$mail_data['entity_id'] = $this->entity_id;
			$mail_data['subject'] = $this->subject;
			$mail_data['bcc'] = $this->bcc;
			$mail_data['cc'] = $this->cc;
			$mail_data['from_name'] = $this->from_name;
			$mail_data['mail_type'] = $this->mail_type;
			$mail_data['recipients'] = $this->recipients;
			$mail_data['message'] = $this->content->render();
			\Weboccult\EatcardMailCompanion\job\SendMailJob::dispatch(json_encode($mail_data));
		} catch (\Exception $e) {
			Log::error('MailService : Error on MailJob create : '.$e->getMessage().' | Line : '.$e->getLine().' | File : ' .$e->getFile());
		}
	}

	/**
	 * @return array|\Illuminate\Contracts\View\View|object|null
	 * @throws \Throwable
	 */
	public function getOrderContent()
	{
		try {
			$this->store = Store::query()->where('id', $this->entity_data->store_id)->first();
			if(isset($this->payload['recipient_type']) && $this->payload['recipient_type'] != 'order.done') {
				$orderData = eatcardPrint()
					->generator(PaidOrderGenerator::class)
					->method(PrintMethod::PROTOCOL)
					->type(PrintTypes::MAIN)
					->system($this->payload['system_type'])
					->payload([
						'order_id'          => $this->entity_id,
						'takeawayEmailType' => $this->payload['recipient_type'],
					])
					->generate();
				return __mailCompanionViews($this->entity_type.'.'.$this->payload['recipient_type'],[
					'data' => $orderData,
					'order' => $this->entity_data,
					'store' => $this->store
				]);
			} else {
				return __mailCompanionViews($this->payload['recipient_type'],[
					'store' => $this->store,
					'order' => $this->entity_data,
				]);
			}


		} catch (\Exception $e) {
			Log::error('MailService : Error on order create mail : '.$e->getMessage().' | Line : '.$e->getLine().' | File : '.$e->getFile());
		}
	}

	public function getReservationContent() {
		Log::info('Reservation status : '.$this->payload['status']);
		$this->store = Store::query()->where('id', $this->entity_data->store_id)->first();
		$this->content = __mailCompanionViews('reservation.'.$this->payload['status'],[
			'store' => $this->store,
			'storeRes' => $this->entity_data,
			'chat_link_url' => encrypt($this->entity_data->store_id . '-' . $this->entity_data->id . '-' . $this->entity_data->user_id).(!is_null($this->entity_data->user_id) ? '/' .$this->entity_data->user_id : ''),
			'data' => $this->payload['other_data'] ?? [],
		]);
//		$this->reservationMail('reservation.'.$this->entity_data->status);
	}

	public function getGiftCouponContent()
	{
		$this->store = Store::query()->where('id', $this->entity_data->store_id)->first();
		$this->gift_card = GiftCard::query()->where('id', $this->entity_data->gift_card_id)->first();
		$this->qr_image = $this->payload['qr_image'];
		switch ($this->payload['recipient_type']) {
			case "user":
				$this->giftPurchaseOrderMail('giftcard.gift-purchase-user');
				break;
			case "owner":
				$this->giftPurchaseOrderMail('giftcard.gift-purchase-owner');
				break;
			case "friend":
				$this->giftPurchaseOrderMail('giftcard.gift-purchase-friend');
				break;
			default:
				break;
		}
	}

	/**
	 * Create mail template content based on given data. Only for gift purchase order
	 */
	public function giftPurchaseOrderMail($mailType)
	{
		$this->content = __mailCompanionViews($mailType,[
			'store' => $this->store,
			'order' => $this->entity_data,
			'gift_card' => $this->gift_card,
			'qr_image' => $this->qr_image,
		]);
	}

	/**
	 * get user register mail
	 */
	public function getUserContent()
	{
		$store = Store::query()->where('id', $this->payload['store_id'])->first();
		$user = User::query()->where('id', $this->entity_id)->first();
		$multipleStores = isset($this->payload['owner_stores']) ? Store::query()->whereIn('id', $this->payload['owner_stores'])->get() : [];
		$this->content = __mailCompanionViews('user.'.$this->payload['recipient_type'],[
			'store' => $store,
			'user' => $user,
			'link' => $this->payload['link'],
			'multipleStores' => $multipleStores
		]);
	}
}
