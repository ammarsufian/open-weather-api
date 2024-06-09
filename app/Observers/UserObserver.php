<?php

namespace App\Observers;

use App\Events\WriteUserLogsEvent;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class UserObserver
{
    public function created(User $user): void
    {
        event(new WriteUserLogsEvent($user,'Create user Account'));
    }

    public function updated(User $user): void
    {
        event(new WriteUserLogsEvent($user,'User update his data '));
    }


}
