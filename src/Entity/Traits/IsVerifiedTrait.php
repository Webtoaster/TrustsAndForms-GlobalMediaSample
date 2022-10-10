<?php

declare(strict_types=1);


namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait IsVerifiedTrait
{

    /**
     * @ORM\Column(
     *     name="is_verified",
     *     type="boolean",
     *     nullable=false,
     *     options={"default"=0, "comment"="Is user verified"}
     *     )
     */
    private bool $isVerified = false;



    public function getIsVerified(): bool
    {
        return $this->isVerified;
    }

    public function isVerified(): bool
    {
        return $this->getIsVerified();
    }

    public function setIsVerified(bool $isVerified): void
    {
        $this->isVerified = $isVerified;
    }


}
