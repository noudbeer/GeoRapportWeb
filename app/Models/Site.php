<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'owner_id',
      'client_id',
      'order_title',
      'orderNumber',
      'cpd_title',
      'cpdNumber',
      'isZone',
      'points',
      'beginning',
      'status_id',
      'end'
    ];

    /**
    * get the users who are validator.
    */
    public function client()
    {
      return $this->belongsTo(Society::class);
    }

    /**
    * get the users who make this site.
    *
    */
    public function owner()
    {
      return $this->belongsTo(User::class);
    }

    /**
    * get the status.
    */
    public function status()
    {
      return $this->belongsTo(Status::class);
    }

    public function validatorUsers() {
      return $this->belongsToMany(User::class, 'validator_site', 'site_id', 'user_id');
    }

    public function contributorUsers() {
        return $this->belongsToMany(User::class, 'contributor_site', 'site_id', 'user_id');
    }
}
