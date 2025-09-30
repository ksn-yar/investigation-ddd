<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\Exception;

use Exception;
use Throwable;

class EntityNotFoundException extends Exception
{
    public function __construct(string $message = 'Entity not found.', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
