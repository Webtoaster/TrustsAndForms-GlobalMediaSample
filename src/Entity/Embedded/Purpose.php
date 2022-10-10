<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Embeddable
 */
class Purpose
{
    /**
     * Purpose for wanting the property.
     * TODO come back and implement validation.
     *
     * @ORM\Column(
     *     name="purpose",
     *     type="string",
     *     length=150,
     *     nullable=true,
     *     options={"fixed"=false}
     * )
     */
    private ?string $purpose = 'FOR ALL LAWFUL PURPOSES';


    public function getPurpose(): ?string
    {
        return $this->purpose;
    }

    public function setPurpose(?string $purpose): void
    {
        $this->purpose = trim($purpose);
    }
}