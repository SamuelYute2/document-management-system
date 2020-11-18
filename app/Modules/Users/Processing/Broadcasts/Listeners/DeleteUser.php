<?php

namespace App\Modules\Users\Processing\Broadcasts\Listeners;

use App\Modules\Priority\Profiles\Administrators\Processing\Broadcasts\Events\AdministratorDeleted;
use App\Modules\Users\Processing\Actions\DeleteUserAction;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class DeleteUser
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
     * @param  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->user)
            App::make(DeleteUserAction::class)->run($event->user);
    }
}
