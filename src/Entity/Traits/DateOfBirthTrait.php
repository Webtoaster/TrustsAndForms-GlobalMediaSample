<?php

namespace App\Entity\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait DateOfBirthTrait
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
     *     name="date_of_birth",
     *     type="date",
     *     nullable=true,
     *     options={"comment"="Date of an event."}
     * )
     */
    private ?DateTime $dateOfBirth = null;

    public function getDateOfBirth(): ?DateTime
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?DateTime $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }




}