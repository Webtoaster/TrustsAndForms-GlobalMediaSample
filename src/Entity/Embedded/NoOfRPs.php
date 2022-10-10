<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use App\Service\Options;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable
 */
class NoOfRPs
{
    /**
     * 21.  Number of Responsible Parties (see definitions) associated with the
     * transferee trust or legal entity
     *
     * @Assert\Choice(
     *     choices=Options::VALID_NUMBER_RESPONSIBLE_PARTIES,
     *     message="Please Number of Responsible Parties."
     *     )
     * @ORM\Column(
     *     name="no_responsible_parties",
     *     type="integer",
     *     nullable=true,
     *     options={"comment"="Number of Responsible Parties"}
     * )
     */
    private ?int $noResponsibleParties = null;

    public function getNoResponsibleParties(): ?int
    {
        return $this->noResponsibleParties;
    }

    public function setNoResponsibleParties(?int $noResponsibleParties): void
    {
        $this->noResponsibleParties = $noResponsibleParties;
    }
}