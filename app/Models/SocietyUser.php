<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocietyUser extends Model
{
    use HasFactory;

    protected $table = 'society_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'society_id'
    ];

    /**
     * return the user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * return the society
     */
    public function society() {
        return $this->belongsTo(Society::class);
    }
}
