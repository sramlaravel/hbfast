<?php

namespace App\Observers;

use App\Models\Language;


class MainCategoryObserver
{
    /**..
     * Handle the main category "created" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function created(Language $mainCategory)
    {
        //
    }

    /**
     * Handle the main category "updated" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function updated(Language $mainCategory)
    {
        $mainCategory -> update(['statu' => $mainCategory ->statu]);
    }

    /**
     * Handle the main category "deleted" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function deleted(Language $mainCategory)
    {
        //
    }

    /**
     * Handle the main category "restored" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function restored(Language $mainCategory)
    {
        //
    }

    /**
     * Handle the main category "force deleted" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function forceDeleted(Language $mainCategory)
    {
        //
    }
}
