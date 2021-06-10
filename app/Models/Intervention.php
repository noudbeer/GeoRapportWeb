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
     * return the attachement site 
     */
    public function site() {
        return $this->belongsTo(Site::class);
    }

    /**
     * return the owner of the intervention 
     */
    public function owner() {
        return $this->belongsTo(User::class);
    }

    /**
     * return the group of the intervention 
     */
    public function interventionsGroup() {
        return $this->belongsTo(InterventionsGroup::class, 'interventionsGroup_id');
    }


    /**
     * return the type of the intervention 
     */
    public function type() {
        return $this->belongsTo(InterventionsType::class);
    }

    /**
     * return the unit of time
     */
    public function unitOfTime() {
        return $this->belongsTo(UnitOfTime::class, 'unitOfTime_id');
    }
}
