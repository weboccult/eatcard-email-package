<?php

namespace Weboccult\EatcardMailCompanion;

use Cmgmyr\Messenger\Models\Message;
use Illuminate\Support\Facades\Log;
use function Weboccult\EatcardMailCompanion\Helpers\getGiftCouponOrderDetail;
use function Weboccult\EatcardMailCompanion\Helpers\getOrderDetail;
use function Weboccult\EatcardMailCompanion\Helpers\getReservationDetail;
use Weboccult\EatcardMailCompanion\job\SendMailJob;
use Weboccult\EatcardMailCompanion\Models\Card;
use Weboccult\EatcardMailCompanion\Models\GiftCard;
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

	/**
	 * @param $payload
	 * @return EatcardMailCompanion
	 */
	public function payload($payload) : self
	{
		$this->payload = $payload;
		return $this;
	}

	/**
	 * @param $content
	 * @return EatcardMailCompanion
	 */
	public function content($content) : self
	{
		$this->content = $content;
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
		} elseif ($this->entityType == 'billing_invoice') {
			$user = User::query()->where('email', $this->recipients)->first();
			$this->content = __mailCompanionViews('billing_invoice', [
				'store_owner' => $user,
				'month' => $this->payload['month'],
			]);
		} elseif ($this->entityType == 'cards') {
			$card = Card::with([
				'store' => function ($s2) {
					$s2->where('is_inactive_mail', 1);
				},
				'customer'
			])->findOrFail($this->entityId);
			$this->content = __mailCompanionViews('user.inactive_user_reminder', [
				'user' => $card->customer,
				'msg' => $this->payload['msg'],
				'store' => $card->store,
			]);
		} elseif ($this->entityType == 'super_admin') {
			$stores = Store::whereDate('expired_on', $this->payload['month_date'])
				->with(['store_owner.user' => function ($q) {
					$q->select('id', 'name');
				}])->get();
			$this->content = __mailCompanionViews('recipient_type', [
				'stores' => $stores,
				'ext_date' => $this->payload['ext_date']
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
			SendMailJob::dispatch(json_encode($mail_data));
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
				return __mailCompanionViews($this->entity_type.'.'.$this->payload['recipient_type'],[
					'data' => isset($this->payload['order_data']) ? $this->payload['order_data'] : $this->content,
					'order' => $this->entity_data,
					'store' => $this->store
				]);
			} else {
				return __mailCompanionViews($this->payload['recipient_type'],[
					'store' => $this->store,
					'order' => $this->entity_data,
					'review_link_url' => $this->payload['review_link_url'] ?? ''
				]);
			}


		} catch (\Exception $e) {
			Log::error('MailService : Error on order create mail : '.$e->getMessage().' | Line : '.$e->getLine().' | File : '.$e->getFile());
		}
	}

	public function getReservationContent() {
		Log::info('Reservation status : '.$this->payload['status']);
		$this->store = Store::query()->where('id', $this->entity_data->store_id)->first();
		$messages = Message::where('thread_id', $this->entity_data->thread_id)
			->where('user_id', '!=', null)
			->orderBy('id', 'desc')->first();
		if(isset($this->payload['page_logo'])) {
			$this->store->page_logo = $this->payload['page_logo'];
		}
		$this->content = __mailCompanionViews('reservation.'.$this->payload['status'],[
			'store' => $this->store,
			'storeRes' => $this->entity_data,
			'chat_link_url' => $this->payload['chat_link_url'] ?? '',
			'review_link_url' => $this->payload['review_link_url'] ?? '',
			'data' => $this->payload['other_data'] ?? [],
			'messages' => $messages,
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
		Log::info('Gift card purchase data : '. json_encode($this->entity_data));
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
