<?php
/*
|--------------------------------------------------------------------------
| app/Http/Controllers/BackendController.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enjoythetrip\Interfaces\BackendRepositoryInterface;
use App\Enjoythetrip\Gateways\BackendGateway;

class BackendController extends Controller
{
    public function __construct(BackendRepositoryInterface $backendRepository, BackendGateway $backendGateway)
    {
        

        $this->bR = $backendRepository;
        $this->bG = $backendGateway; /* Lecture 17 */
    }
    /* Lecture 6 */
    public function index(Request $request)
    {
        $objects = $this->bG->getReservations($request);
        return view('backend.index', ['objects'=>$objects]);
    }
    
    /* Lecture 6 */
    public function cities()
    {
        return view('backend.cities');
    }
    
    /* Lecture 6 */
    public function myobjects()
    {
        return view('backend.myobjects');
    }
    
    /* Lecture 6 */
    public function profile()
    {
        return view('backend.profile');
    }
    
    /* Lecture 6 */
    public function saveobject()
    {
        return view('backend.saveobject');
    }
    
    /* Lecture 6 */
    public function saveroom()
    {
        return view('backend.saveroom');
    }
}
