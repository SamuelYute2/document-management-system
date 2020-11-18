<?php

namespace App\Modules\Users\Processing\Broadcasts\Listeners;

use App\Modules\Priority\Profiles\Administrators\Processing\Broadcasts\Events\AdministratorCreated;
use App\Modules\Users\Processing\Actions\CreateUserAction;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class CreateUser
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
        if ($event->data['is_user'])
            App::make(CreateUserAction::class)->run($event->data['user'], $event->parent);
    }
}
