<?php

namespace App\Entity\Traits;

trait PlainPasswordTrait
{

    private ?string $plainPassword;

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

}