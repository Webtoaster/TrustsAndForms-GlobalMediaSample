<?php

namespace App\Entity\Embedded;


use App\Service\Options;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Embeddable
 */
class Status
{


    /**
     * @Assert\Choice(
     *     groups={
     *         "form_1",
     *         "form_4",
     *         "form_5",
     *     },
     *     choices=Options::VALID_FORM_STATUS,
     *     message="Please the valid status level."
     *     )
     * @ORM\Column(
     *     name="form_status",
     *     type="integer",
     *     nullable=true,
     * )
     */
    private ?int $form_status = null;


    public function getFormStatus(): ?int
    {
        return $this->form_status;
    }


    public function setFormStatus(?int $form_status): void
    {
        $this->form_status = $form_status;
    }


}