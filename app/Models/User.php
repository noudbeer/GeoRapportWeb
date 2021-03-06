<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *
     */
    public function role() {
		return $this->belongsTo(Role::class);
	}

    /**
	 * Check one role
	 *
	 * @param string $role
	 */
	public function hasRole($name) {
		return ($this->role->name === $name);
	}

    /**
     * The society that belong to the user.
     */
    public function societies()
    {
        return $this->belongsToMany(Society::class);
    }

    /**
     * get sites where the user is validator.
     */
    public function controls()
    {
        return $this->belongsToMany(Site::class, 'validator_site');
    }

    /**
     * get sites that the user is contributor.
     */
    public function contributions()
    {
        return $this->belongsToMany(Site::class, 'contributor_site');
    }

    public function clients() {
        return $this->belongsToMany(SocietyUser::class, 'society_user', 'user_id', 'society_id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\UserVerificationEmail);
    }

    public function allSites() {
        $oSites = $this->ownerSites()->get();
        $vSites = $this->validatorSites()->get();
        $cSites = $this->contributorSites()->get();

        return $oSites->merge($vSites->merge($cSites));
    }

    public function ownerSites() {
        return $this->hasMany(Site::class, 'owner_id');
    }

    public function validatorSites() {
        return $this->belongsToMany(Site::class, 'validator_site', 'user_id', 'site_id');
    }

    public function contributorSites() {
        return $this->belongsToMany(Site::class, 'contributor_site', 'user_id', 'site_id');
    }
}
