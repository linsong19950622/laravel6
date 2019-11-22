<?php

namespace App\Providers;

use App\Listeners\DemoEventSubscriberListener;
use App\Models\DemoModel;
use App\Observers\DemoObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

//        DemoModel::observe(DemoObserver::class); //观察者 注册
    }

    /**
     * @var array
     */
    protected $subscribe = [
//        DemoEventSubscriberListener::class, //订阅者 监听
    ];
}
