<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\ValueObject;

interface ValueObjectInterface
{
    public function getValue(): mixed;

    public function __toString(): string;
}
