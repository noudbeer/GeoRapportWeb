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
		'owner',
		'name',
		'orderNumber',
    'client',
    'isZone',
    'points',
		'beginning',
    'status',
    'end', 
	];

  /**
     * get the users who are controller.
     */
    public function controllers()
    {
        return $this->belongsToMany(Site::class);
    }

    /**
     * get the users who are contributor.
     */
    public function contributors()
    {
        return $this->belongsToMany(Site::class);
    }
}
