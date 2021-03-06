<?php
/*
|--------------------------------------------------------------------------
| app/Http/Controllers/Auth/RegisterController.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers\Auth;

use App\{User, Role};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin'; /* Lecture 7 */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255', /* Lecture 7 */
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'], /* Lecture 7 */
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        
        if(!Role::where('name', 'owner')->exists()) {
            Role::create(['name'=>'owner']);
            Role::create(['name'=>'tourist']);
            Role::create(['name'=>'admin']);
        }
        
        if($data['owner'] ?? 0) $user->roles()->attach( Role::where('name', 'owner')->first()->id);
        else
            $user->roles()->attach( Role::where('name', 'tourist')->first()->id);
        
        return $user;
    }
}

