<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Embeddable
 */
class Email
{

    /**
     * TODO You can also use the strict email validation since the egulias/email-validator is installed.
     * @Assert\Email(
     *     groups={
     *          "email_required",
     *          "registration",
     *          "reg",
     *          "signin",
     *          "signup",
     *     },
     *     mode = "html5",
     *     message = "Please enter a valid email address.",
     *     normalizer="trim"
     *     )
     *
     * @Assert\Length(
     *     groups={
     *          "email_required",
     *          "registration",
     *          "reg",
     *          "signin",
     *          "signup",
     *     },
     *     max="254",
     *     maxMessage="The maximum length of the email is {{ limit }} characters.)",
     * )
     * @ORM\Column(
     *     name="email",
     *     type="string",
     *     unique=false,
     *     length=254,
     *     nullable=true,
     *     options={"comment"="Email Address"}
     * )
     */
    private ?string $email = null;


    public function getEmail(): ?string
    {
        return $this->email;
    }


    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }


}