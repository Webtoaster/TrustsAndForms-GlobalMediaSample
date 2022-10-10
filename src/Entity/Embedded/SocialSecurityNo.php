<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Embeddable
 */
class SocialSecurityNo
{
    //  use SocialSecurityNoTrait;


    /**
     * @ORM\Column(
     *     name="ss_no",
     *     type="string",
     *     length=32,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Social Security No"}
     * )
     */
    private ?string $ssn = null;


    public function getSsn(): ?string
    {
        return $this->ssn;
    }


    public function setSsn(?string $ssn): void
    {
        $this->ssn = trim($ssn);
    }


}