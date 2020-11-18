<?php

namespace App\Modules\Employees\Processing\Broadcasts\Listeners;

use App\Modules\Priority\Profiles\Administrators\Processing\Broadcasts\Events\AdministratorUpdated;
use App\Modules\Employees\Processing\Actions\UpdateEmployeeAction;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class UpdateEmployee
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
        if ($event->data['is_employee'])
            App::make(UpdateEmployeeAction::class)->run($event->data['employee'], $event->parent->employee);
    }
}
