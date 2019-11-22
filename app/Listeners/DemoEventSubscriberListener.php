<?php

namespace App\Listeners;

use App\Events\DemoDeletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class DemoEventSubscriberListener
{

    public function onDemoDeleted($event) {
        Log::info('demo 通过订阅者监听模型事件' . json_encode($event->model));
    }

    public function subscribe($events)
    {
        $events->listen(DemoDeletedEvent::class, DemoEventSubscriberListener::class . '@onDemoDeleted');
    }
}
