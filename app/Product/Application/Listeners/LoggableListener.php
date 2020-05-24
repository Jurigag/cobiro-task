<?php
declare(strict_types=1);

namespace App\Product\Application\Listeners;

use App\SharedKernel\Interfaces\Loggable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class LoggableListener
{
    public function handle(Loggable $event)
    {
        $className = get_class($event);

        \Log::channel('domain_events')->info("$className: {$event->getLoggableContent()}");
    }
}
