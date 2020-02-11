<?php
/*
|--------------------------------------------------------------------------
| app/Enjoythetrip/Repositories/FrontendRepository.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

namespace App\Enjoythetrip\Gateways; 

use App\Enjoythetrip\Interfaces\FrontendRepositoryInterface; 


class FrontendGateway  {  
    public function __construct(FrontendRepositoryInterface $fR) {
        $this->fR = $fR;
    }

    public function searchCities($request)
    {
       $term = $request->input('term');
        $result = [];
       $queries = $this->fR->getSearchCities($term);
        foreach($queries as $query) {
            $result = ['id'=>$query->id, 'value'=>$query->name];
        }
        return $result;
    } 


}


