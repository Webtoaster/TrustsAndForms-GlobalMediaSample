<?php

declare(strict_types=1);

namespace App\Entity\Embedded;


use App\Service\Options;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Embeddable
 */
class State
{

    /**
     * @Assert\NotBlank(
     *     groups={"address_required"},
     *     normalizer="trim",
     *     allowNull=false,
     *     message="Please select a valid US State.",
     * )
     * @Assert\Choice(
     *     groups={"address_required"},
     *     choices=Options::VALID_STATES,
     *     message="Please select a valid US State."
     * )
     * @ORM\Column(
     *     name="state",
     *     type="string",
     *     length=2,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address state"}
     * )
     */
    private ?string $state = null;


    public function getState(): ?string
    {
        return $this->state;
    }


    public function setState(?string $state): void
    {
        $this->state = trim($state);
    }


}