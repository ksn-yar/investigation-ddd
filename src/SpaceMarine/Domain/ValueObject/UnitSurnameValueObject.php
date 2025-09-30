<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\ValueObject;

use InvalidArgumentException;

class UnitSurnameValueObject implements ValueObjectInterface
{
    public function __construct(private string $value)
    {
        $this->value = mb_ucfirst(trim($this->value));

        if (mb_strlen($this->value) < 3) {
            throw new InvalidArgumentException('Value requires at least 5 characters.');
        }

        if (mb_strlen($this->value) > 50) {
            throw new InvalidArgumentException('Value must not be greater than 100 characters');
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
