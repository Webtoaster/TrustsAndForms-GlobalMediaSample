<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Embeddable
 */
class Event
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
     *     name="date",
     *     type="date",
     *     nullable=true,
     *     options={"comment"="Date of an event."}
     * )
     */
    private ?DateTime $date = null;

    public function getDate(): ?DateTime
    {
        return $this->date;
    }


    public function setDate(?DateTime $date): void
    {
        $this->date = $date;
    }


}