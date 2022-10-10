<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Embedded\Event;
use App\Entity\Traits\EmailRequiredTrait;
use App\Entity\Traits\IdTrait;
use App\Entity\Traits\IsVerifiedTrait;
use App\Entity\Traits\PasswordTrait;
use App\Entity\Traits\PlainPasswordTrait;
use App\Entity\Traits\RolesTrait;
use App\Entity\Traits\TrackingTrait;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email address.")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    use IdTrait;
    use TrackingTrait;
    use RolesTrait;
    use IsVerifiedTrait;
    use PasswordTrait;
    use EmailRequiredTrait;
    use PlainPasswordTrait;

    public function __construct()
    {
        $this->tosAgreed = new Event();
        $this->tosVersion = new Event();
        $this->party = new Party();
    }

    /**
     * @ORM\Column(
     *     name="token",
     *     nullable=true,
     *     type="string",
     *     length=64,
     *      options={
     *      "comment"="Token for one time access."}
     * )
     */
    private ?string $token = null;

    /**
     * @ORM\OneToOne(
     *     targetEntity=Party::class,
     *     inversedBy="user",
     *     cascade={"persist", "remove"})
     */
    private Party $party;

    /**
     * @Assert\Valid
     * @ORM\Embedded(
     *     class="App\Entity\Embedded\Event",
     *     columnPrefix="tos_")
     */
    public Event $tosAgreed;

    /**
     * @Assert\Valid
     * @ORM\Embedded(
     *     class="App\Entity\Embedded\Event",
     *     columnPrefix="tos_version_")
     */
    public Event $tosVersion;

    public function eraseCredentials(): void
    {
        $this->plainPassword = null;
    }

    public function getUserIdentifier(): string
    {
        return $this->getEmail();
    }

    public function getCity(): ?string
    {
        return $this->getPhysicalCity();
    }

    public function getFirst(): ?string
    {
        return $this->party->getFirst();
    }

    public function getFirstName(): ?string
    {
        return $this->getFirst();
    }

    public function getLast(): ?string
    {
        return $this->party->getLast();
    }

    public function getLine1(): ?string
    {
        return $this->getPhysicalLine1();
    }

    public function getLine2(): ?string
    {
        return $this->getPhysicalLine2();
    }

    public function getMiddle(): ?string
    {
        return $this->party->getMiddle();
    }

    public function getParty(): ?Party
    {
        return $this->party;
    }

    public function setParty(?Party $party): self
    {
        $this->party = $party;
        return $this;
    }

    public function getState(): ?string
    {
        return $this->getPhysicalState();
    }

    public function getSuffix(): ?string
    {
        return $this->party->getSuffix();
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = trim($token);
    }

    public function getZipcode(): ?string
    {
        return $this->getPhysicalZipcode();
    }

    public function setCity(?string $city): void
    {
        $this->party->setPhysicalCity($city);
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
        $this->party->setEmail($email);
    }

    public function setFirst(?string $first): void
    {
        $this->party->setFirst($first);
    }

    public function setLast(?string $last): void
    {
        $this->party->setLast($last);
    }

    public function setLine1(?string $line1): void
    {
        $this->setPhysicalLine1($line1);
    }

    public function setLine2(?string $line2): void
    {
        $this->setPhysicalLine2($line2);
    }

    public function setMiddle(?string $middle): void
    {
        $this->party->setMiddle($middle);
    }

    public function setState(?string $state): void
    {
        $this->setPhysicalState($state);
    }

    public function setSuffix(?string $suffix): void
    {
        $this->party->setSuffix($suffix);
    }

    public function setZipcode(?string $zipcode): void
    {
        $this->setPhysicalZipcode($zipcode);
    }

    public function getMailLine1(): ?string
    {
        return $this->party->getMailLine1();
    }

    public function setMailLine1(?string $mailLine1): void
    {
        $this->party->setMailLine1($mailLine1);
    }

    public function getMailLine2(): ?string
    {
        return $this->party->getMailLine2();
    }

    public function setMailLine2(?string $mailLine2): void
    {
        $this->party->setMailLine1($mailLine2);
    }

    public function getMailCity(): ?string
    {
        return $this->party->getMailCity();
    }

    public function setMailCity(?string $mailCity): void
    {
        $this->party->setMailCity($mailCity);
    }

    public function getMailState(): ?string
    {
        return $this->party->getMailState();
    }

    public function setMailState(?string $mailState): void
    {
        $this->party->setMailState($mailState);
    }

    public function getMailZipcode(): ?string
    {
        return $this->party->getMailZipcode();
    }

    public function setMailZipcode(?string $mailZipcode): void
    {
        $this->party->setMailZipcode($mailZipcode);
    }

    public function getPhysicalLine1(): ?string
    {
        return $this->party->getPhysicalLine1();
    }

    public function setPhysicalLine1(?string $PhysicalLine1): void
    {
        $this->party->setPhysicalLine1($PhysicalLine1);
    }

    public function getPhysicalLine2(): ?string
    {
        return $this->party->getPhysicalLine2();
    }

    public function setPhysicalLine2(?string $PhysicalLine2): void
    {
        $this->party->setPhysicalLine1($PhysicalLine2);
    }

    public function getPhysicalCity(): ?string
    {
        return $this->party->getPhysicalCity();
    }

    public function setPhysicalCity(?string $PhysicalCity): void
    {
        $this->party->setPhysicalCity($PhysicalCity);
    }

    public function getPhysicalState(): ?string
    {
        return $this->party->getPhysicalState();
    }

    public function setPhysicalState(?string $PhysicalState): void
    {
        $this->party->setPhysicalState($PhysicalState);
    }

    public function getPhysicalZipcode(): ?string
    {
        return $this->party->getPhysicalZipcode();
    }

    public function setPhysicalZipcode(?string $PhysicalZipcode): void
    {
        $this->party->setPhysicalZipcode($PhysicalZipcode);
    }

    public function getDateOfBirth(): ?DateTime
    {
        return $this->party->getDateOfBirth();
    }

    public function setDateOfBirth(?DateTime $dateOfBirth): void
    {
        $this->party->setDateOfBirth($dateOfBirth);
    }

    public function getDateOfDeath(): ?DateTime
    {
        return $this->party->getDateOfDeath();
    }

    public function setDateOfDeath(?DateTime $dateOfDeath): void
    {
        $this->party->setDateOfBirth($dateOfDeath);
    }

    public function getPhoneMain(): ?string
    {
        return $this->party->getPhoneMain();
    }

    public function setPhoneMain(?string $phoneMain): void
    {
        $this->party->setPhoneMain($phoneMain);
    }

    public function getPhoneAlternate(): ?string
    {
        return $this->party->getPhoneAlternate();
    }

    public function setPhoneAlternate(?string $phoneAlternate): void
    {
        $this->party->setPhoneAlternate($phoneAlternate);
    }

}