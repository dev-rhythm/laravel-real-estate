<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'user_role', 'invited_by', 'photo', 'website', 'facebook',
        'custom_logo', 'email_signature', 'trial_count', 'trial_expire_date', 'email_token'
    ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Function to check trial expired
     */
    public function trial_expired()
    {
        if ($this->user_role == '2') { // main user.
            $plan = Invoice::where('user_id', $this->id)->count();
            if ($plan == null) {
                $dt = \Carbon\Carbon::parse($this->trial_expire_date);
                return $dt->isPast();
            } else {
                return false;
            }
        } else if ($this->user_role == '3') { // this means that logged in user is invited user.
            $parent_user = User::findOrFail($this->invited_by);

            $plan = Invoice::where('user_id', $parent_user->id)->count();
            if ($plan == null) {
                $dt = \Carbon\Carbon::parse($parent_user->trial_expire_date);
                return $dt->isPast();
            } else {
                return false;
            }
        } else {
            // return false for all other users.
            return false;
        }
    }

    /**
     * Get the active_invoices associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function active_invoices()
    {
        return $this->hasOne(Invoice::class, 'user_id', 'id');
    }

    /**
     * Get trial count based on user
     * if 2 then main user
     * if 3 then send parent user
     */
    public function getTrialCount()
    {
        if ($this->user_role == '2') {
            return $this->trial_count;
        } else if ($this->user_role == '3') {
            $parent_user = User::findOrFail($this->invited_by);
            return $parent_user->trial_count;
        }
        return false;
    }


    /**
     * Get the api associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function active_api()
    {
        return $this->hasOne(ManageApi::class, 'user_id', 'id');
    }
}