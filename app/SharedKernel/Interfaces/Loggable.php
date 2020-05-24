<?php
declare(strict_types=1);

namespace App\SharedKernel\Interfaces;

interface Loggable
{
    public function getLoggableContent(): string;
}
