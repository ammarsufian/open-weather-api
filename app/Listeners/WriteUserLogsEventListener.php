<?php

namespace App\Listeners;

use App\Events\WriteUserLogsEvent;
use App\Models\UserLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WriteUserLogsEventListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(WriteUserLogsEvent $event): void
    {
        UserLog::create([
            'user_id' => $event->user->id,
            'action' => $event->action
        ]);
    }
}
