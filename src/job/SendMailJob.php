<?php

namespace Weboccult\EatcardMailCompanion\job;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use function Weboccult\EatcardMailCompanion\Helpers\updateEmailCount;
use Weboccult\EatcardMailCompanion\Models\BillingInvoice;
use Weboccult\EatcardMailCompanion\Models\MailHistory;
use Weboccult\EatcardMailCompanion\Models\MailJob;

class SendMailJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	private $details;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct($details)
	{
		$this->queue = 'email-queue';
		$this->details = $details;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		try {
			Log::info('Send mail job uuid : '.json_encode($this->job->payload()['uuid']));
			$mailDetails = json_decode($this->details);
			Log::info('Send mail entity id : '. $mailDetails->entity_id.' | entity type : '. $mailDetails->entity_type);
			Log::info('Send mail type : '.$mailDetails->mail_type);
			if ($mailDetails->recipients && filterValidateEmail($mailDetails->recipients)) {
				Log::info('Recipients mail ID : ' . $mailDetails->recipients);
				updateEmailCount('success');
				Log::info('create mail entry in history table');
//				if($mailDetails->entity_type != 'reservation') {
					Log::info('Entity type was reservation');
					$mailHistory = new MailHistory();
					$mailHistory->entity_type = $mailDetails->entity_type;
					$mailHistory->entity_id = $mailDetails->entity_id;
					$mailHistory->subject = $mailDetails->subject;
					$mailHistory->bcc = $mailDetails->bcc;
					$mailHistory->cc = $mailDetails->cc;
					$mailHistory->from_name = $mailDetails->from_name;
					$mailHistory->mail_type = $mailDetails->mail_type;
					$mailHistory->recipients = $mailDetails->recipients;
					$mailHistory->message = $mailDetails->message;
					$mailHistory->save();
//				} else {
//					Log::info('Entity type was not reservation');
//					MailJob::query()->create([
//						'entity_type' => $mailDetails->entity_type,
//						'entity_id' => $mailDetails->entity_id,
//						'subject' => $mailDetails->subject,
//						'bcc' => $mailDetails->bcc,
//						'cc' => $mailDetails->cc,
//						'from_name' => $mailDetails->from_name,
//						'mail_type' => $mailDetails->mail_type,
//						'recipients' => $mailDetails->recipients,
//						'message' => $mailDetails->message,
//						'is_sent' => 1,
//						'in_queue' => 0
//					]);
//				}
				Log::info('After create mail entry in history table');
				Mail::html($mailDetails->message, function ($message) use ($mailDetails) {
					$message->to($mailDetails->recipients)->subject($mailDetails->subject);
					$message->from(env('MAIL_FROM_ADDRESS'), $mailDetails->from_name);
					if ($mailDetails->bcc) {
						$bcc = explode(',', $mailDetails->bcc);
						$message->bcc($bcc);
					}
					if ($mailDetails->cc) {
						$cc = explode(',', $mailDetails->cc);
						$message->cc($cc);
					}
					if($mailDetails->entity_type == 'billing_invoice') {
						$billingInvoice = BillingInvoice::query()->where('id', $mailDetails->entity_id)->first();
						$message->attach($billingInvoice->invoice_url, [
							'as' => $billingInvoice->invoice_number.'.pdf'
						]);
					}
				});
			}
			else {
				updateEmailCount('error');
				throw new \Exception('Email validation failed : '.$mailDetails->recipients);
			}
		} catch (\Exception $e) {
			Log::error('Error on sendmail jobs catch : UUID : '.json_encode($this->job->payload()['uuid']).' | Message : '.$e->getMessage().' | Line : '.$e->getLine());
		}
	}
}
