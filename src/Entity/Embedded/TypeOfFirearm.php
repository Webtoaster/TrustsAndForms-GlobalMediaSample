<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Embeddable
 */
class TypeOfFirearm
{

    /**
     * this will come from one of the first questions asked.
     * TODO Asserts for validation
     * @ORM\Column(
     *     name="type_firearm",
     *     type="string",
     *     length=16,
     *     nullable=true,
     *     options={"fixed"=false,"comment"="This is going to be the ATF firearm field."}
     * )
     */
    private ?string $typeFirearm = null;

    public function getTypeFirearm(): ?string
    {
        return $this->typeFirearm;
    }

    public function setTypeFirearm(?string $typeFirearm): void
    {
        $this->typeFirearm = trim($typeFirearm);
    }
}