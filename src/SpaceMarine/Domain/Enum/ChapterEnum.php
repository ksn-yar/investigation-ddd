<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\Enum;

use App\Common\Trait\EnumFromNameTrait;

enum ChapterEnum: string
{
    use EnumFromNameTrait;

    case DARK_ANGELS = 'Dark Angels';
    case IMPERIAL_FISTS = 'Imperial Fists';
    case BLOOD_ANGELS = 'Blood Angels';
    case RAVEN_GUARD = 'Raven Guard';
}
