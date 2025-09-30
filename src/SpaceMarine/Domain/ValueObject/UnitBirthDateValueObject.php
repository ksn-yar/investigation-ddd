<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\ValueObject;

use DateTimeImmutable;
use InvalidArgumentException;

final readonly class UnitBirthDateValueObject implements ValueObjectInterface
{
    public function __construct(private DateTimeImmutable $value)
    {
        if ($this->value->getTimestamp() >= (new DateTimeImmutable())->getTimestamp()) {
            throw new InvalidArgumentException('Value cannot be greater than or equal to current date');
        }
    }

    public function __toString(): string
    {
        return $this->value->format('Y-m-d H:i:s');
    }

    public function getValue(): DateTimeImmutable
    {
        return $this->value;
    }
}
