<p align="center"><a href="https://github.com/weboccult/eatcard-companion" target="_blank"><img src="./Docs/images/EatCard-Weboccult.png" width="400"></a></p>

<h2 align="center">
   Eatcard Mail Companion
</h2>

<br>

<h4 align="center">

![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/weboccult/eatcard-companion?style=for-the-badge)
![Latest Version on Packagist](https://img.shields.io/packagist/v/weboccult/eatcard-companion?style=for-the-badge)

![GitHub Workflow Status (branch)](https://img.shields.io/github/workflow/status/weboccult/eatcard-companion/run-tests/master?style=for-the-badge)

![GitHub last commit](https://img.shields.io/github/last-commit/weboccult/eatcard-companion?style=for-the-badge)
![GitHub Release Date](https://img.shields.io/github/release-date/weboccult/eatcard-companion?label=Latest%20Release&style=for-the-badge)

![Total Downloads](https://img.shields.io/packagist/dt/weboccult/eatcard-companion.svg?style=for-the-badge)
![GitHub contributors](https://img.shields.io/github/contributors/weboccult/eatcard-companion?style=for-the-badge)
![GitHub](https://img.shields.io/github/license/weboccult/eatcard-companion?style=for-the-badge)

[comment]: <> ([![GitHub Code Style Action Status]&#40;https://img.shields.io/github/workflow/status/weboccult/eatcard-companion/Check%20&%20fix%20styling?label=code%20style&#41;]&#40;https://github.com/weboccult/eatcard-companion/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain&#41;)

---

</h4>

<p align="center">This companion package will help our team to manage to generic functionality and features at one place.</p>

## Installation

#### You can install the package via composer:

```bash
composer require weboccult/eatcard-mail-companion
```

## Usage

```php
use Weboccult\EatcardMailCompanion\Helpers\eatcardMailSend;
```

## Available Services

- Create Mail : To generate mail template based on requirements
- Send Mail : To send mail via Laravel Queue/Jobs

## Companion Config

here's how you can use publish companion config file to manage numerous settings

```php
php artisan eatcardMailcompanion:publish --type=config
```
It will publish eatcardMailCompanion.php to your parent project

### Basic Usage

#### Create Mail

- Payload : user requirements
- subject : Set mail subject
- recipients : Recipients user email address
- mailType : Type of mail (For developer)
- fromName : Mail sender name
- entityType : Type of mail (Where to get data)
- entityId : Get data based on entityId
- dispatch : Mail data dispatch in queue
- template : Direct send mail template to user without details
- bcc : Extra email addresses
- cc : Extra email addresses

```php
use Weboccult\EatcardMailCompanion\Helpers\eatcardMailSend;

eatcardMailSend()
    ->payload(['store_id' => $order['store_id'], 'recipient_type' => 'order.done'])
    ->subject(__('messages.takeaway_order_done_mail_sub') . ' ' . getDutchDate($order['order_date']))
    ->recipients($order['email'])
    ->bcc([])
    ->cc([])
    ->mailType('Order done mail from admin')
    ->fromName(env('MAIL_FROM_NAME'))
    ->template('Reservation create')
    ->entityType('order')
    ->entityId($order['id'])
    ->dispatch();

OR
use Weboccult\EatcardMailCompanion\EatcardMailCompanion;

EatcardMailCompanion::
    payload(['store_id' => $order['store_id'], 'recipient_type' => 'order.done'])
    ->subject(__('messages.takeaway_order_done_mail_sub') . ' ' . getDutchDate($order['order_date']))
    ->recipients($order['email'])
    ->bcc([])
    ->cc([])
    ->mailType('Order done mail from admin')
    ->fromName(env('MAIL_FROM_NAME'))
    ->template('Reservation create')
    ->entityType('order')
    ->entityId($order['id'])
    ->dispatch();
    
```

#### Send Mail

- Mail send from jobs (SendMailJobs)
- Create mail entry in mongoDb database after sending mail successfully to user
- If something went wrong in mail sending part then data moved on failed jobs table



