<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait TypeOfPartyTrait
{

    /**
     * TODO Maybe make this database driven.
     * 2a Checkboxes on Type of Entity
     * Enumerated - Corporation, Individual, Other Legal Entity, or Trust
     *
     * @ORM\Column(
     *     name="type_of_party",
     *     type="string",
     *     length=32,
     *     nullable=true,
     *     options={"fixed"=false,"comment"="Type Specifiation"}
     * )
     */
    private ?string $typeOfParty = null;

    public function getTypeOfParty(): ?string
    {
        return $this->typeOfParty;
    }

    public function setTypeOfParty(?string $typeOfParty): void
    {
        $this->typeOfParty = $typeOfParty;
    }

}