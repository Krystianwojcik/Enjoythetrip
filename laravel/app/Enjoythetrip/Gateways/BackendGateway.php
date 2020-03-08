<?php
/*
|--------------------------------------------------------------------------
| app/Enjoythetrip/Gateways/BackendGateway.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/
namespace App\Enjoythetrip\Gateways; /* Lecture 17 */

use App\Enjoythetrip\Interfaces\BackendRepositoryInterface; /* Lecture 17 */ 


/* Lecture 17 */
class BackendGateway { 
        
     
    /* Lecture 17 */
    public function __construct(BackendRepositoryInterface $bR ) 
    {
        $this->bR = $bR;
    }
    
    public function getReservations($request) {
        if($request->user()->hasRole(['owner', 'admin'])) {
            $objects = $this->bR->getOwnerReservations($request);
        } else {
            $objects = $this->bR->getTouristReservations($request);
        }
        return $objects;
    }

}


