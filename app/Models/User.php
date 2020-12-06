<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    use HasFactory, Notifiable;

    /**
     * Table name
     * @var string
     */
    protected $table  = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'isTeacher',
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
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get personals sections created by the user
     *
     * @return array[Section]
     */
    public function personalSections()
    {
        return $this->hasMany('\App\Models\Section', 'user')->where('personal', '1');
    }

    /**
     * Get owned groups
     *
     * @return array[Group]
     */
    public function ownedGroups()
    {
        return $this->hasMany('\App\Models\Group', 'creator');
    }

    /**
     * Get suscribed groups
     *
     * @return array[Group]
     */
    public function suscribedGroups()
    {
        return $this->belongsTo('\App\Models\Group', 'users_has_groups', 'user', 'group');
    }

    /**
     * Get suscribed sections
     *
     * @return array[Sections]
     */
    public function suscribedSections()
    {
        return $this->hasManyDeep(
            '\App\Models\Section',
            ['users_has_groups','\App\Models\Group','sections_has_groups'],
            ['user','id','group','id'],
            ['id','group','id','group']
        );
    }
}
