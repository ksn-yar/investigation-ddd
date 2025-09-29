<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\Enum;

use App\Common\Trait\EnumFromNameTrait;

enum UnitSpecializationEnum: string
{
    use EnumFromNameTrait;

    case BOLTER = 'Bolter';
    case SNIPER = 'Sniper';
    case HEAVY_BOLTER = 'Heavy bolter';
    case ROCKET_LAUNCHER = 'Rocket launcher';
    case FLAMETHROWER = 'Flamethrower';
    case PLASMA = 'Plasma';
}
