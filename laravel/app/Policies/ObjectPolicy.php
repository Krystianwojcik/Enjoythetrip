<?php
/*
|--------------------------------------------------------------------------
| app/Policies/ObjectPolicy.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

namespace App\Policies; /* Lecture 43 */

use App\{User,TouristObject}; /* Lecture 43 */
use Illuminate\Auth\Access\HandlesAuthorization; /* Lecture 43 */


 /* Lecture 43 */
class ObjectPolicy
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
    
    
    public function checkOwner(User $user, TouristObject $object)
    {
        return $user->id === $object->user_id;     
    }
}

