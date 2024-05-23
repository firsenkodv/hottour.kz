<?php

namespace App\Providers;

use App\Events\CalcEvent;
use App\Events\CreateUserEvent;
use App\Events\MessageAdminCreateUserEvent;
use App\Events\OrderCallEvent;
use App\Events\OrderMiniEvent;
use App\Events\PickResponceEvent;
use App\Events\PickSubscriptionEvent;
use App\Events\PickTourEvent;
use App\Events\ResetPasswordEvent;
use App\Events\SendOrderTourEvent;
use App\Events\SignatureEvent;
use App\Events\SystemMessageEvent;
use App\Listeners\CalcHandlerListener;
use App\Listeners\CreateUserHandlerListener;
use App\Listeners\MessageAdminCreateUserHandlerListener;
use App\Listeners\OrderCallHandlerListener;
use App\Listeners\OrderMiniHandlerListener;
use App\Listeners\PickResponceHandlerListener;
use App\Listeners\PickSubscriptionHandlerListener;
use App\Listeners\PickTourHandlerListener;
use App\Listeners\ResetPasswordHandlerListener;
use App\Listeners\SendOrderTourHandlerListener;
use App\Listeners\SignatureListener;
use App\Listeners\SystemMessageListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        OrderCallEvent::class => [
            OrderCallHandlerListener::class
        ],
        OrderMiniEvent::class => [
            OrderMiniHandlerListener::class
        ],
        PickTourEvent::class => [
            PickTourHandlerListener::class
        ],
        PickSubscriptionEvent::class => [
            PickSubscriptionHandlerListener::class
        ],
        PickResponceEvent::class => [
            PickResponceHandlerListener::class
        ],
        CalcEvent::class => [
            CalcHandlerListener::class
        ],
        SendOrderTourEvent::class => [
            SendOrderTourHandlerListener::class
        ],
        CreateUserEvent::class => [
            CreateUserHandlerListener::class
        ],
        MessageAdminCreateUserEvent::class => [
            MessageAdminCreateUserHandlerListener::class
        ],
        ResetPasswordEvent::class => [
            ResetPasswordHandlerListener::class
        ],
        SystemMessageEvent::class => [
            SystemMessageListener::class
        ],
        SignatureEvent::class => [
            SignatureListener::class
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
