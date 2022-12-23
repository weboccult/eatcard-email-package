<?php

namespace Weboccult\EatcardMailCompanion\Models;

use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use function Weboccult\EatcardMailCompanion\Helpers\getS3File;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'store_name',
        'store_slug',
        'first_name',
        'last_name',
        'phone_no',
        'address1',
        'address2',
        'profile_img',
        'bod',
        'gender_prefix',
        'post_code',
        'city',
        'my_company',
        'features_popup_show',
        'selected_store_id',
        'unique_code',
        'image',
        'is_team_access',
        'is_insights_access'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['profile_image_url'];

//    protected static function boot()
//        {
//            parent::boot();
//
//            static::created(function ($model){
//                Log::info(' User added |  User : ' . json_encode($model) . ' | Added by : ' . auth()->user()->name);
//            });
//
//            static::updated(function($model)
//            {
//                $dirty = $model->getDirty();
//                if (!empty($dirty)) {
//	                $user=getUserDetail();
//                    foreach ($dirty as $field => $newdata) {
//                        $olddata = $model->getOriginal($field);
//                        $oldData['old'][$field] = $olddata;
//                        $newData['new'][$field] = $newdata;
//                    }
//
//                    $user_role = User::find($model->id)->getUserRoleAttribute();
//                    if ($user_role == 'store_owner') {
//                        $role = 'Store Owner';
//                    } else if ($user_role == 'store_manager') {
//                        $role = 'Store Manager';
//                    } else {
//                        $role = ' ';
//                    }
//                    if(auth()->user()) {
//    	                $msg = ' ' . $role . ' Updated: ' . $user['role'] . ' (' . $user['name'] . '-' . $user['id'] . ') updated a ' . $role . ' detail ' . $model->name . ' | id-' . $model->id . ' . ' . print_r($oldData, true) . ' => ' . print_r($newData, true) . '' . ' | User '. json_encode( auth()->user()) . '' ;
//    	                Log::info($msg. ', IP address : '.request()->ip(). ', browser : '. request()->header('User-Agent'));
//
//                    }
//                }
//            });
//
//            static::deleted(function ($model){
//                $dirty_old_data = $model->getOriginal();
//                if (!empty($dirty_old_data)) {
//                   Log::info($model->name .' Deleted by : '. auth()->user()->name . '  Deleted data  | ' . print_r($dirty_old_data , true));
//                }
//            });
//
//        }


    public function getProfileImageUrlAttribute()
    {

        if ($this->image) {
            return getS3File($this->profile_img);
        } else {
            return config('eatcardMailCompanion.AWS_URL') . 'assets/no_image.png';
        }
    }
}
