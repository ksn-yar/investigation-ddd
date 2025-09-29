<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\ValueObject;

use App\SpaceMarine\Domain\Enum\UnitSpecializationEnum;
use InvalidArgumentException;

final readonly class ScoutSpecializationValueObject implements ValueObjectInterface
{
    private const array ALLOW_SPECIALIZATIONS = [
        UnitSpecializationEnum::BOLTER,
        UnitSpecializationEnum::SNIPER,
        UnitSpecializationEnum::FLAMETHROWER
    ];

    private UnitSpecializationEnum $value;

    public function __construct(string $value)
    {
        $this->value = UnitSpecializationEnum::from($value);

        if (in_array($this->value, self::ALLOW_SPECIALIZATIONS, true) === false) {
            throw new InvalidArgumentException('Value must be one of: ' . implode(', ', self::ALLOW_SPECIALIZATIONS));
        }
    }

    public function getValue(): UnitSpecializationEnum
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value->value;
    }
}
