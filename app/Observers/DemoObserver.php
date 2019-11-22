<?php

namespace App\Observers;

use App\Models\DemoModel;
use Illuminate\Support\Facades\Log;

class DemoObserver
{

    /**
     * Handle the demo model "deleted" event.
     *
     * @param  DemoModel  $demoModel
     * @return void
     */
    public function deleted(DemoModel $demoModel)
    {
        Log::info('demo 通过观察者监听模型事件' . json_encode($demoModel));
    }
}
