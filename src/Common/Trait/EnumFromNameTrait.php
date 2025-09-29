<?php

declare(strict_types=1);

namespace App\Common\Trait;

use ValueError;

trait EnumFromNameTrait
{
    public static function fromName(string $name): static
    {
        foreach (self::cases() as $case) {
            if ($name === $case->name) {
                return $case;
            }
        }

        throw new ValueError(
            sprintf("%s is not a valid backing value for enum %s.", $name, static::class)
        );
    }
}
