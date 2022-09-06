<?php

namespace Weboccult\EatcardMailCompanion\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static entityType($entityType)
 * @method static entityId($entityId)
 * @method static payload($payload)
 * @method static subject($subject)
 * @method static recipients($recipient_email)
 * @method static fromName($fromName)
 * @method static bcc($bcc)
 * @method static cc($cc)
 * @method static mailType($mailType)
 * @method static template($template_name)
 * @method static dispatch()
 *
 * @mixin \Weboccult\EatcardMailCompanion\EatcardMailCompanion
 * @return \Weboccult\EatcardMailCompanion\EatcardMailCompanion
 * @see \Weboccult\EatcardMailCompanion\EatcardMailCompanion
 */
class EatcardMailCompanion extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'eatcard-mail-companion'; /*Default*/

//	    return EatcardMailCompanion::class;
//	    If you have dd on class then return string like above dd(EatcardMailCompanion::class) => eatcard-mail-companion
    }
}
