<?php

namespace App\Providers;
use Illuminate\Auth\Events\Verified;
use App\Listeners\SendWelcomeEmailAfterVerification;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Verified::class => [
            SendWelcomeEmailAfterVerification::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
