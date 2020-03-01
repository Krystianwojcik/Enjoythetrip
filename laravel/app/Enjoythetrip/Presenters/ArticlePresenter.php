<?php
/*
|--------------------------------------------------------------------------
| app/Enjoythetrip/Presenters/UserPresenter.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/
namespace App\Enjoythetrip\Presenters; /* Lecture 16 */

/* Lecture 16 */
trait ArticlePresenter {
    
    /* Lecture 16 */
    public function getLinkAttribute()
    {
        return route('article',['id'=>$this->id]);
    }
    public function getTypeAttribute()
    {
        return 'Artykuł '.$this->title;
    }
    
}

