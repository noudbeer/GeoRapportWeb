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
		'beginning',
    'status',
    'end', 
	];
}
