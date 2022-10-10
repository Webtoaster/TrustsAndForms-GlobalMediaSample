<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Service\Options;

/**
 * @ORM\Embeddable
 */
class TypeOfTransfer
{
    /**
     * 2a Checkboxes on Type of Entity
     * Enumerated - Corporation, Individual, Other Legal Entity, or Trust
     * TODO set the groups.
     *
     * @Assert\Choice(
     *     groups={
     *          "group1",
     *     },
     *     choices=Options::VALID_FORM_4_TRANSFER_TYPE,
     *     message="Please Select the Transfer Fee."
     *     )
     *
     * @ORM\Column(
     *     name="type",
     *     type="string",
     *     length=16,
     *     nullable=true,
     *     options={"fixed"=false,"comment"="Type Specifiation"}
     * )
     */
    private ?string $type = null;


    public function getType(): ?string
    {
        return $this->type;
    }


    public function setType(?string $type): void
    {
        $this->type = trim($type);
    }


}