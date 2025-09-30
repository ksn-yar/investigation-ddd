<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\ValueObject;

use App\SpaceMarine\Domain\Enum\UnitSpecializationEnum;
use InvalidArgumentException;

final readonly class MarineSpecializationValueObject implements ValueObjectInterface
{
    private const array ALLOW_SPECIALIZATIONS = [
        UnitSpecializationEnum::BOLTER,
        UnitSpecializationEnum::HEAVY_BOLTER,
        UnitSpecializationEnum::PLASMA,
        UnitSpecializationEnum::FLAMETHROWER,
        UnitSpecializationEnum::ROCKET_LAUNCHER,
    ];

    private UnitSpecializationEnum $value;

    public function __construct(string $value)
    {
        $this->value = UnitSpecializationEnum::fromName($value);

        if (false === \in_array($this->value, self::ALLOW_SPECIALIZATIONS, true)) {
            throw new InvalidArgumentException('Value must be one of: ' . implode(', ', self::ALLOW_SPECIALIZATIONS));
        }
    }

    public function __toString(): string
    {
        return $this->value->value;
    }

    public function getValue(): UnitSpecializationEnum
    {
        return $this->value;
    }
}
