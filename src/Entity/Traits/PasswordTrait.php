<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait PasswordTrait
{

    /**
     * @ORM\Column(
     *     name="pw",
     *     nullable="false",
     *     type="string",
     *      options={
     *      "comment"="Password for the user."}
     * )
     */
    private ?string $password;

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
}