<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\Interfaces;

use App\SpaceMarine\Domain\Entity\ScoutEntity;

interface ScoutManagerInterface
{
    public function save(ScoutEntity $scoutEntity): void;

    public function delete(ScoutEntity $scoutEntity): void;
}
