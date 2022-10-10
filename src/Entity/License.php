<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Enums\LineEndings;
use App\Repository\LicenseRepository;
use App\Service\Normalize;
use App\Service\NormalizeStrings;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=LicenseRepository::class)
 * @ORM\Table(name="license")
 */
class License
{
    use IdTrait;

    // use NormalizerTrait;

    use TimestampableEntity;

    public function getHTMLDisplay(): ?string
    {
        $n = new Normalize(LineEndings::HTML);

        $n->setLicenseName($this->getLicenseName());
        $n->setBusinessName($this->getBusinessName());
        $n->setLine1($this->getPremiseStreet());
        $n->setCity($this->getPremiseCity());
        $n->setState($this->getPremiseState());
        $n->setState($this->getPremiseState());

        return $n->getDisplayName();
    }

    public function getPDFDisplay(): ?string
    {
        $n = new Normalize(LineEndings::PDF);

        $n->setLicenseName($this->getLicenseName());
        $n->setBusinessName($this->getBusinessName());
        $n->setLine1($this->getPremiseStreet());
        $n->setCity($this->getPremiseCity());
        $n->setState($this->getPremiseState());
        $n->setState($this->getPremiseState());

        return $n->getDisplayName();
    }

    public function getSingleLineDisplay(): ?string
    {
        $n = new Normalize(LineEndings::SINGLE_LINE);

        $n->setLicenseName($this->getLicenseName());
        $n->setBusinessName($this->getBusinessName());
        $n->setLine1($this->getPremiseStreet());
        $n->setCity($this->getPremiseCity());
        $n->setState($this->getPremiseState());
        $n->setState($this->getPremiseState());

        return $n->getDisplayName();
    }

    /**
     * @ORM\Column(
     *     name="month",
     *     length=2,
     *     type="string",
     *     options={"fixed"="true",
     *              "comment"="Month the file is applicable for."}
     *     )
     */
    private string $month;

    /**
     * @ORM\Column(
     *     name="year",
     *     length=4,
     *     type="string",
     *     options={"fixed"="true",
     *              "comment"="Year the file is applicable for."}
     *     )
     */
    private string $year;

    /**
     * @ORM\Column(
     *     name="lic_regn",
     *     length=1,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="true",
     *               "comment"="ATF License Region"}
     *     )
     */
    private ?string $licRegn;

    /**
     * @ORM\Column(
     *     name="lic_dist",
     *     length=2,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="true",
     *              "comment"="ATF License District"}
     *     )
     */
    private ?string $licDist;

    /**
     * @ORM\Column(
     *     name="lic_cnty",
     *     length=3,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="true",
     *              "comment"="ATF License County"}
     *     )
     */
    private ?string $licCnty;

    /**
     * @ORM\Column(
     *     name="lic_type",
     *     length=3,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="true",
     *              "comment"="ATF License Type"}
     *     )
     */
    private ?string $licType;

    /**
     * @ORM\Column(
     *     name="lic_xprdte",
     *     length=2,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="true",
     *              "comment"="ATF License Expiration Date"}
     *     )
     */
    private ?string $licXprdte;

    /**
     * @ORM\Column(
     *     name="lic_seqn",
     *     length=5,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="true",
     *              "comment"="ATF License Sequence, or actual license No."}
     *     )
     */
    private ?string $licSeqn;

    /**
     * @ORM\Column(
     *     name="license_name",
     *     length=64,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="false",
     *              "comment"="Licenses Corporate Entity.  May be different that their DBA."}
     *     )
     */
    private ?string $licenseName;

    /**
     * @ORM\Column(
     *     name="business_name",
     *     length=64,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="false",
     *              "comment"="Business NameSimple or DBA."}
     *     )
     */
    private ?string $businessName;

    /**
     * @ORM\Column(
     *     name="premise_street",
     *     length=64,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="false",
     *              "comment"="Business Premisises Street Address"}
     *     )
     */
    private ?string $premiseStreet;

    /**
     * @ORM\Column(
     *     name="premise_city",
     *     length=64,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="false",
     *              "comment"="Business Premisises City"}
     *     )
     */
    private ?string $premiseCity;

    /**
     * @ORM\Column(
     *     name="premise_state",
     *     length=2,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="true",
     *     "comment"="Business Premisises State"}
     *     )
     */
    private ?string $premiseState;

    /**
     * @ORM\Column(
     *     name="premise_zip_code",
     *     length=10,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="false",
     *              "comment"="Business Premisises Zip Code"}
     *     )
     */
    private ?string $premiseZipCode;

    /**
     * @ORM\Column(
     *     name="mail_street",
     *     length=64,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="false",
     *              "comment"="Mailing Address Street"}
     *     )
     */
    private ?string $mailStreet;

    /**
     * @ORM\Column(
     *     name="mail_city",
     *     length=64,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="false",
     *              "comment"="Mailing Address "}
     *     )
     */
    private ?string $mailCity;

    /**
     * @ORM\Column(
     *     name="mail_state",
     *     length=2,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="true",
     *              "comment"="Mailing Address "}
     *     )
     */
    private ?string $mailState;

    /**
     * @ORM\Column(
     *     name="mail_zip_code",
     *     length=10,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="true",
     *              "comment"="Mailing Address Zip"}
     *     )
     */
    private ?string $mailZipCode;

    /**
     * @ORM\Column(
     *     name="voice_phone",
     *     length=12,
     *     type="string",
     *     nullable=true,
     *     options={"fixed"="true",
     *     "comment"="Telephone number for the business or responsible party."}
     *     )
     */
    private ?string $voicePhone;

    public function setVoicePhone(?string $voicePhone): void
    {
        $this->voicePhone = NormalizeStrings::normalizePhoneNumber($voicePhone);
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * This will return the name for the licensee, evaluating if the business name field is an empty string.
     */
    public function getName(): string
    {
        if (trim($this->getBusinessName()) === '') {
            return trim($this->getbusinessName());
        }

        return trim($this->getLicenseName());
    }

    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    public function setBusinessName(?string $businessName): void
    {
        $this->businessName = $businessName;
    }

    public function getLicenseName(): ?string
    {
        return $this->licenseName;
    }

    public function setLicenseName(?string $licenseName): void
    {
        $this->licenseName = $licenseName;
    }

    /**
     * @deprecated Use the Normalizer Service
     */
    public function getMailAddress(bool $html = true): string
    {
        if ($html === true) {
            $line_ending = "<br/>";
        } else {
            $line_ending = "\r\n";
        }

        $address = $this->getName().$line_ending;
        $address .= trim($this->getMailStreet()).$line_ending;
        $address .= trim($this->getMailCity()).", ".trim($this->getMailState())." ".
            trim(
                $this->getMailZipCode()
            );

        return $address;
    }

    public function getMailStreet(): ?string
    {
        return $this->mailStreet;
    }

    public function setMailStreet(?string $mailStreet): void
    {
        $this->mailStreet = $mailStreet;
    }

    public function getMailCity(): ?string
    {
        return $this->mailCity;
    }

    public function setMailCity(?string $mailCity): void
    {
        $this->mailCity = $mailCity;
    }

    public function getMailState(): ?string
    {
        return $this->mailState;
    }

    public function setMailState(?string $mailState): void
    {
        $this->mailState = $mailState;
    }

    public function getMailZipCode(): ?string
    {
        return $this->mailZipCode;
    }

    public function setMailZipCode(?string $mailZipCode): void
    {
        $this->mailZipCode = $mailZipCode;
    }

    public function getLicenseSection1(): string
    {
        return $this->getLicRegn().$this->getLicDist().$this->getLicCnty();
    }

    public function getLicRegn(): ?string
    {
        return $this->licRegn;
    }

    public function setLicRegn(?string $licRegn): void
    {
        $this->licRegn = $licRegn;
    }

    public function getLicDist(): ?string
    {
        return $this->licDist;
    }

    public function setLicDist(?string $licDist): void
    {
        $this->licDist = $licDist;
    }

    public function getLicCnty(): ?string
    {
        return $this->licCnty;
    }

    public function setLicCnty(?string $licCnty): void
    {
        $this->licCnty = $licCnty;
    }

    public function getLicenseSection2(): string
    {
        return $this->getLicType();
    }

    public function getLicType(): ?string
    {
        return $this->licType;
    }

    public function setLicType(?string $licType): void
    {
        $this->licType = $licType;
    }

    public function getLicenseSection3(): string
    {
        return $this->getLicXprdte();
    }

    public function getLicXprdte(): ?string
    {
        return $this->licXprdte;
    }

    public function setLicXprdte(?string $licXprdte): void
    {
        $this->licXprdte = $licXprdte;
    }

    public function getLicenseSection4(): string
    {
        return $this->getLicSeqn();
    }

    public function getLicSeqn(): ?string
    {
        return $this->licSeqn;
    }

    public function setLicSeqn(?string $licSeqn): void
    {
        $this->licSeqn = $licSeqn;
    }

    public function getPremisesAddress(bool $html = true): string
    {
        if ($html === true) {
            $line_ending = "<br/>";
        } else {
            $line_ending = "\r\n";
        }

        $address = $this->getName().$line_ending;
        $address .= trim($this->getPremiseStreet()).$line_ending;
        $address .= trim($this->getPremiseCity()).", ".trim($this->getPremiseState())." ".
            trim(
                $this->getPremiseZipCode()
            );

        return $address;
    }

    public function getPremiseStreet(): ?string
    {
        return $this->premiseStreet;
    }

    public function setPremiseStreet(?string $premiseStreet): void
    {
        $this->premiseStreet = $premiseStreet;
    }

    public function getPremiseCity(): ?string
    {
        return $this->premiseCity;
    }

    public function setPremiseCity(?string $premiseCity): void
    {
        $this->premiseCity = $premiseCity;
    }

    public function getPremiseState(): ?string
    {
        return $this->premiseState;
    }

    public function setPremiseState(?string $premiseState): void
    {
        $this->premiseState = $premiseState;
    }

    public function getPremiseZipCode(): ?string
    {
        return $this->premiseZipCode;
    }

    public function setPremiseZipCode(?string $premiseZipCode): void
    {
        $this->premiseZipCode = $premiseZipCode;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    public function getMonth(): string
    {
        return $this->month;
    }

    public function setMonth(string $month): void
    {
        $this->month = $month;
    }

    public function getVoicePhone(): ?string
    {
        return $this->voicePhone;
    }

}