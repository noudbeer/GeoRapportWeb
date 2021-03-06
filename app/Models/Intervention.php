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
        'owner_id',
        'location',
        'datetimeOfIntervention',
        'teamMembers',
        'interventionsGroup_id',
        'interventionsGroup',
        'type_id',
        'interventionsType',
        'quantity',
        'unit',
        'comment',
        'timeSpent',
        'unitOfTime_id'
    ];

    protected $hidden = [
        'owner_id',
        'interventionsGroup_id',
        'type_id',
        'unit',
        'unitOfTime_id',
        'created_at',
        'updated_at'
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
