<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * Table name
     * @var string
     */
    protected $table  = 'groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'creator',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get suscribed members
     *
     * @return array[User]
     */
    public function suscribedMembers()
    {
        return $this->belongsTo('\App\Models\User', 'users_has_groups', 'group', 'user');
    }

    /**
     * Get owner user
     *
     * @return User
     */
    public function creator()
    {
        return $this->belongsTo('\App\Models\User', 'creator');
    }

    /**
     * Get sections' group
     *
     * @return array[Section]
     */
    public function sections()
    {
        return $this->belongsTo('\App\Models\Section', 'sections_has_groups', 'group', 'section');
    }
}
