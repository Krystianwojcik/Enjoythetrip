<?php
/*
|--------------------------------------------------------------------------
| app/Listeners/ReservationConfirmedListener.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

namespace App\Listeners;

use App\Events\ReservationConfirmedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notification; /* Lecture 54 */

class ReservationConfirmedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ReservationConfirmedEvent  $event
     * @return void
     */
    public function handle(ReservationConfirmedEvent $event)
    {
        /* Lecture 54 */
        Notification::create([
            
            'user_id'=>$id = $event->reservation->user_id,
            'content'=>__('Reservation has been confirmed for room :number in :object object. Day in :dayin , day out :dayout',[
                'number'=>$event->reservation->room ->room_number,
                'object'=>$event->reservation->room->object->name,
                'dayin'=>$event->reservation->day_in,
                'dayout'=>$event->reservation->day_out
                    ]),
            'status'=>0,
                
            ]);
        
        
        $memcache = new \Memcached(); /* Lecture 54 */

        $memcache->addServer('localhost', 11211) or die("Could not connect"); /* Lecture 54 */

        $memcache->set('userid_' . $id. '_notification_timestamp',time()); /* Lecture 54 */
    }
}

