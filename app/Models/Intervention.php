<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    protected $table = 'interventions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_id',
        'location',
        'datetimeOfIntervention',
        'owner_id',
        'teamMembers',
        'interventionsGroup_id',
        'type_id',
        'quantity',
        'unit',
        'description',
        'timeSpent',
        'unitOfTime_id'
	];

    /**
     * retrun the attachement site 
     */
    public function site() {
        return $this->belongsTo(Site::class);
    }
}
