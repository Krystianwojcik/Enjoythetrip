<?php
/*
|--------------------------------------------------------------------------
| app/Policies/ReservationPolicy.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

namespace App\Policies; /* Lecture 35 */

use App\{User,Reservation}; /* Lecture 35 */
use Illuminate\Auth\Access\HandlesAuthorization; /* Lecture 35 */

/* Lecture 35 */
class ReservationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /* Lecture 35 */
    public function reservation(User $user, Reservation $reservation)
    {
        if($user->hasRole(['owner','admin']))
        return $user->id === $reservation->room->object->user->id;
        else
        return $user->id === $reservation->user_id;
    }
}

