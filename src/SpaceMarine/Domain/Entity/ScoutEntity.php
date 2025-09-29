<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\Entity;

use App\SpaceMarine\Domain\Interfaces\ScoutManagerInterface;
use App\SpaceMarine\Domain\ValueObject\BirthDateValueObject;
use App\SpaceMarine\Domain\ValueObject\ScoutSpecializationValueObject;
use App\SpaceMarine\Domain\ValueObject\UnitChapterValueObject;
use App\SpaceMarine\Domain\ValueObject\UnitNameValueObject;
use App\SpaceMarine\Domain\ValueObject\UnitSurnameValueObject;
use DateTimeImmutable;

final class ScoutEntity
{
    private ScoutManagerInterface $scoutManager;

    private function __construct(
        private ?int $id,
        private UnitChapterValueObject $chapter,
        private ScoutSpecializationValueObject $specialization,
        private UnitNameValueObject $name,
        private UnitSurnameValueObject $surname,
        private BirthDateValueObject $birthDate,
    ) {
    }

    public static function create(
        ?int $id,
        string $chapter,
        string $specialization,
        string $name,
        string $surname,
        DateTimeImmutable $birthDate,
    ): ScoutEntity {
        return new self(
            id: $id,
            chapter: new UnitChapterValueObject($chapter),
            specialization: new ScoutSpecializationValueObject($specialization),
            name: new UnitNameValueObject($name),
            surname: new UnitSurnameValueObject($surname),
            birthDate: new BirthDateValueObject($birthDate),
        );
    }

    public function save(): void
    {
        $this->scoutManager->save($this);
    }

    public function delete(): void
    {
        $this->scoutManager->delete($this);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChapter(): UnitChapterValueObject
    {
        return $this->chapter;
    }

    public function getSpecialization(): ScoutSpecializationValueObject
    {
        return $this->specialization;
    }

    public function getName(): UnitNameValueObject
    {
        return $this->name;
    }

    public function getSurname(): UnitSurnameValueObject
    {
        return $this->surname;
    }

    public function getBirthDate(): BirthDateValueObject
    {
        return $this->birthDate;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setChapter(string $chapter): self
    {
        $this->chapter = new UnitChapterValueObject($chapter);
        return $this;
    }

    public function setSpecialization(string $specialization): self
    {
        $this->specialization = new ScoutSpecializationValueObject($specialization);
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = new UnitNameValueObject($name);
        return $this;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = new UnitSurnameValueObject($surname);
        return $this;
    }

    public function setBirthDate(DateTimeImmutable $birthDate): self
    {
        $this->birthDate = new BirthDateValueObject($birthDate);
        return $this;
    }

    public function setScoutManager(ScoutManagerInterface $scoutManager): self
    {
        $this->scoutManager = $scoutManager;
        return $this;
    }
}
