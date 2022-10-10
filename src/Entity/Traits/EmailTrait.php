<?php

// TODO You can also use the strict email validation since the egulias/email-validator is installed.

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


trait EmailTrait
{
    /**
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
     *     normalizer="trim")
     * @Assert\Length(
     *     groups={
     *          "email_required",
     *          "registration",
     *          "reg",
     *          "signin",
     *          "signup",
     *     },
     *     max="180",
     *     maxMessage="The maximum length of the email is {{ limit }} characters.)")
     * @ORM\Column(
     *     name="email",
     *     type="string",
     *     unique=false,
     *     length=180,
     *     nullable=true,
     *     options={"comment"="Email Address"})
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