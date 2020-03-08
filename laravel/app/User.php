<?php
/*
|--------------------------------------------------------------------------
| app/User.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Enjoythetrip\Presenters\UserPresenter;
    
    public static $roles = []; /* Lecture 27 */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname'   /* Lecture 7 surname */
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    /* Lecture 16 */
    public function objects()
    {
        return $this->morphedByMany('App\TouristObject', 'likeable');
    }
    
    /* Lecture 22 */
    public function larticles()
    {
        return $this->morphedByMany('App\Article', 'likeable');
    }
    
    /* Lecture 16 */
    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }
    /* Lecture 23 */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function rolse()
    {
        return $this->belongsToMany('App\Role');
    }
    
    public function hasRole(array $roles)
    {
        foreach($roles as $role)
        {
            if(isset(self::$roles[$role])) 
            {
                if(self::$roles[$role])  return true;
            }
            else
            {
                self::$roles[$role] = $this->roles()->where('name', $role)->exists();
                if(self::$roles[$role]) return true;
            }
        }
        return false;
    }
}

