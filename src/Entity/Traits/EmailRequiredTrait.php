<?php
//  TODO You can also use the strict email validation since the egulias/email-validator is installed.

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait EmailRequiredTrait
{
    /**
     * @Assert\Email(
     *     groups={
     *          "email_required",
     *          "registration",
     *          "reg",
     *          "signin",
     *          "signup",
     *          "email_user",},
     *     mode = "html5",
     *     message = "Please enter a valid email address.  '{{ value }}', is not a valid.",
     *     normalizer="trim")
     *@Assert\NotBlank(
     *     message="The Email Address cannot be empty or blank.",
     *     groups={"email_user"}
     * )
     * @Assert\Unique(
     *     message="There is already an account with this Email Address.",
     *     groups={"email_user"}
     * )
     * @ORM\Column(
     *     type="string",
     *     length=180,
     *     unique=true,
     *     nullable=false,
     *     name="email",
     *     options={"comment"="Email Address of the user for thier login"})
     */
    private string $email;

    public function getEmail(): string
    {
        return $this->email;
    }


}