<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Traits\AddressMailingTrait;
use App\Entity\Traits\AddressPhysicalTrait;
use App\Entity\Traits\CompanyTrait;
use App\Entity\Traits\DateOfBirthTrait;
use App\Entity\Traits\DateOfDeathTrait;
use App\Entity\Traits\EmailTrait;
use App\Entity\Traits\IdTrait;
use App\Entity\Traits\PersonTrait;
use App\Entity\Traits\PhoneAlternateTrait;
use App\Entity\Traits\PhoneMainTrait;
use App\Entity\Traits\TitleTrait;
use App\Entity\Traits\URLTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Table(name="party")
 * @ORM\Entity(repositoryClass="App\Repository\PartyRepository")
 */
class Party
{



    use IdTrait;
    use TimestampableEntity;

    use PersonTrait;
    use CompanyTrait;
    use TitleTrait;

    use AddressMailingTrait;
    use AddressPhysicalTrait;

    use EmailTrait;
    use URLTrait;

    use DateOfBirthTrait;
    use DateOfDeathTrait;

    use PhoneMainTrait;
    use PhoneAlternateTrait;

    /**
     * @ORM\OneToOne(
     *     targetEntity=User::class,
     *     mappedBy="party",
     *     cascade={"persist", "remove"})
     */
    private User $user;

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null ) {
            $this->user->setParty(null);
        }
        // set the owning side of the relation if necessary
        if ($user !== null && $user->getParty() !== $this) {
            $user->setParty($this);
        }
        $this->user = $user;

        return $this;
    }

}