<?php

namespace App\Entity\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait DateOfDeathTrait
{

    /**
     * @Assert\Date
     * @Assert\NotBlank(
     *     groups={
     *     "date_death_required",
     *     "date_death_required",
     *     "f4_req_decedent",
     *     "f5_req_decedent",
     *     "cert_date",
     * },
     *     message="This Date is Required."
     * )
     * This date will always have a prefix in front of it.
     * @ORM\Column(
     *     name="date_of_death",
     *     type="date",
     *     nullable=true,
     *     options={"comment"="Date of Death."}
     * )
     */
    private ?DateTime $dateOfDeath = null;

    public function getDateOfDeath(): ?DateTime
    {
        return $this->dateOfDeath;
    }

    public function setDateOfDeath(?DateTime $dateOfDeath): void
    {
        $this->dateOfDeath = $dateOfDeath;
    }

}