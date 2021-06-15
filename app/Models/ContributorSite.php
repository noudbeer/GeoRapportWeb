<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Site;

class ContributorSite extends Model
{
  use HasFactory;

  protected $table = 'contributor_site';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'site_id',
	];

  /**
   * 
   */
  public function user() {
    return $this->belongsTo(User::class);
  }

  /**
   * 
   */
  public function site() {
    return $this->belongsTo(Site::class);
  }
}
