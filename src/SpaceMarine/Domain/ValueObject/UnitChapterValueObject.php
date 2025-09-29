<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\ValueObject;

use App\SpaceMarine\Domain\Enum\ChapterEnum;

final readonly class UnitChapterValueObject implements ValueObjectInterface
{
    private ChapterEnum $value;

    public function __construct(string $value)
    {
        $this->value = ChapterEnum::from($value);
    }

    public function getValue(): ChapterEnum
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value->value;
    }
}
