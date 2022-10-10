<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable
 */
class County
{

    /**
     * @Assert\NotBlank(
     *     groups={
     *          "f1_req",
     *          "f4_req",
     *          "f5_req",
     *     },
     *     normalizer="trim",
     *     message=""
     * )
     * @Assert\Length(
     *     groups={"address_county_required"},
     *     normalizer="trim",
     *     min="3",
     *     max="32",
     *     minMessage="The County field must be between 3 and 32 alphanumeric characters long.",
     *     maxMessage="The County field must be between 3 and 32 alphanumeric characters long."
     * )
     * TODO regex here.
     * @ORM\Column(
     *     name="county",
     *     type="string",
     *     length=32,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address County"}
     * )
     */
    private ?string $county = null;

    public function getCounty(): ?string
    {
        return $this->county;
    }


}