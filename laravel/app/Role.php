<?php
/*
|--------------------------------------------------------------------------
| app/Role.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

namespace App; /* Lecture 27 */

use Illuminate\Database\Eloquent\Model; /* Lecture 27 */

/* Lecture 27 */
class Role extends Model
{
    
    protected $quarded = [];
public $timestamps = false;
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

