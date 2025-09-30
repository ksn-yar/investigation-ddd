<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\ValueObject;

interface ValueObjectInterface
{
    public function __toString(): string;

    public function getValue(): mixed;
}
