<?php
/*
|--------------------------------------------------------------------------
| app/Reservation.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

namespace App; /* Lecture 19 */

use Illuminate\Database\Eloquent\Model; /* Lecture 19 */

/* Lecture 19 */
class Reservation extends Model
{
    public $timestamps = false; /* Lecture 26 */
    protected $guarded = ['id']; /* Lecture 26 */
    //protected $fillable = ['name']; /* Lecture 26 */
    
    function public user() {
        return $this->belongsTo('App\User');
    }
}

