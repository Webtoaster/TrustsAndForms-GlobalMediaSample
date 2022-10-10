<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use App\Service\Options;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable
 */
class Citizenship
{
    /**
     * 18a. Country of Citizenship: (Check/list more than one, if applicable.  Nationals
     * of the United States may check U.S.A.) (See definition 1r)
     * United States of America
     * Enums - United States of America, Other County/Countries
     * @Assert\Choice(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req"},
     *     choices=Options::VALID_US_CITIZEN,
     *     message="Choose a valid option."
     * )
     * @ORM\Column(
     *     name="is_us_citizen",
     *     type="boolean",
     *     nullable=false,
     *     options={"default"=0, "comment"="Checkbox if they are a US Citizen"})
     */
    private bool $isUSCitizen = false;

    /**
     * 18a. Country of Citizenship: (Check/list more than one, if applicable.  Nationals
     * of the United States may check U.S.A.) (See definition 1r)
     * United States of America
     * Enums - United States of America, Other County/Countries
     * @Assert\Choice(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req"},
     *     choices=Options::VALID_US_CITIZEN,
     *     message="Choose a valid option."
     * )
     * @ORM\Column(
     *     name="is_other_citizen",
     *     type="boolean",
     *     nullable=false,
     *     options={"default"=0, "comment"="Checkbox if they are a US Citizen"})
     */
    private bool $isOtherCitizen = false;

    /**
     * 18a - Continued: Other Country/Countries (specify):
     * @Assert\Type(
     *     groups={
     *        "f1_ind_req_alien",
     *        "f4_ind_req_alien",
     *        "f5_ind_req_alien",
     *        "frp_org_req_alien",
     * },
     *     type={"alnum"},
     *     message="Use only Letters and Spaces in County of Citizenship."
     * )
     * @Assert\Length(
     *     groups={
     *        "f1_ind_req_alien",
     *        "f4_ind_req_alien",
     *        "f5_ind_req_alien",
     *        "frp_org_req_alien",
     * },
     *     min="2",
     *     max="45",
     * )
     * @ORM\Column(
     *     name="citizenship",
     *     type="string",
     *     length=45,
     *     nullable=true,
     *     options={"fixed"=false}
     * )
     */
    private ?string $citizenship = null;

    /**
     * 18b  State of Birth
     * @Assert\Type(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req",
     * },
     *     type={"alnum"},
     *     message="Pleasse enter a valid State of Birth."
     * )
     * @Assert\Length(
     *     groups={
     *        "f1_ind_req_alien",
     *        "f4_ind_req_alien",
     *        "f5_ind_req_alien",
     *        "frp_org_req_alien",
     * },
     *     min="2",
     *     max="44",
     * )
     * @ORM\Column(
     *     name="state_of_birth",
     *     type="string",
     *     length=44,
     *     nullable=true,
     *     options={"fixed"=false}
     * )
     */
    private ?string $stateOfBirth = null;

    /**
     * 18c Country of Birth
     * @Assert\Type(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req",
     * },
     *     type={"alnum"},
     *     message="Pleasse enter a valid County of Birth."
     * )
     * @ORM\Column(
     *     name="country_of_birth",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"fixed"=false,"comment"=""}
     * )
     */
    private ?string $countryOfBirth = null;

    /**
     * 18d. Have you ever renounced your United States citizenship?
     * @Assert\Choice(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req"},
     *     callback={"App\Service\Options", "VALID_YES_NO"},
     *     message="Choose a valid option."
     * )
     * @ORM\Column(
     *     name="q_renounced_citizenship",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $qRenouncedCitizenship = null;

    /**
     * 18e. Are you an alien illegally or unlawfully in the United States?
     * @Assert\Choice(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req"},
     *     callback={"App\Service\Options", "VALID_YES_NO"},
     *     message="Choose a valid option."
     * )
     * @ORM\Column(
     *     name="q_illegal_alien",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $qIllegalAlien = null;

    /**
     * 18f.1. Are you an alien who has been admitted to the United States under
     * a non-immigrant visa?
     * @Assert\Choice(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req"},
     *     callback={"App\Service\Options", "VALID_YES_NO"},
     *     message="Choose a valid option."
     * )
     * @ORM\Column(
     *     name="q_resident_alien",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $qResidentAlien = null;

    /**
     * 18f.2. if “yes”, do you fall within any of the exceptions stated in the instructions?
     * Attach the documentation to the application N/A Yes No
     * @Assert\Choice(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req"},
     *     callback={"App\Service\Options", "VALID_YES_NO_NA"},
     *     message="Choose a valid option."
     * )
     * @ORM\Column(
     *     name="q_alien_exception",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $qAlienException = null;

    /**
     * 19. If you are an alien, record your U.S.-Issued Alien or Admission number
     * (AR#, USCIS#, or 194#): Yes or No
     * @Assert\Regex(
     *     groups={
     *          "",
     *     },
     *     pattern="/^[a-zA-Z0-9\s.\-_,]+$/",
     *     match=false,
     *     message=""
     * )
     * @ORM\Column(
     *     name="resident_alien_no",
     *     type="string",
     *     length=16,
     *     nullable=true,
     *     options={"fixed"=false}
     * )
     */
    private ?string $residentAlienNo = null;

    /**
     * 20.  Have you been issued a Unique Personal Identification Number (UPIN)?
     * (See instruction 2h) No if yes please list.
     * @Assert\Choice(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req"},
     *     callback={"App\Service\Options", "VALID_YES_NO"},
     *     message="Choose a valid option."
     * )
     * @ORM\Column(
     *     name="has_upin",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $hasUPIN = null;

    /**
     * @Assert\Regex(
     *     groups={
     *          "",
     *     },
     *     pattern="/^[a-zA-Z0-9\s.\-_,]+$/",
     *     match=false,
     *     message=""
     * )
     * @ORM\Column(
     *     name="unique_person_id_no",
     *     type="string",
     *     length=16,
     *     nullable=true,
     *     options={"fixed"=false,"comment"=""}
     * )
     */
    private ?string $upin = null;

    public function isOtherCitizen(): bool
    {
        return $this->isOtherCitizen;
    }

    public function setIsOtherCitizen(bool $isOtherCitizen): void
    {
        $this->isOtherCitizen = $isOtherCitizen;
    }

    public function isUSCitizen(): bool
    {
        return $this->isUSCitizen;
    }

    public function setIsUSCitizen(bool $isUSCitizen): void
    {
        $this->isUSCitizen = $isUSCitizen;
    }

    public function getStateOfBirth(): ?string
    {
        return $this->stateOfBirth;
    }

    public function setStateOfBirth(?string $stateOfBirth): void
    {
        $this->stateOfBirth = $stateOfBirth;
    }

    public function getCountryOfBirth(): ?string
    {
        return $this->countryOfBirth;
    }

    public function setCountryOfBirth(?string $countryOfBirth): void
    {
        $this->countryOfBirth = $countryOfBirth;
    }

    public function getQIllegalAlien(): ?string
    {
        return $this->qIllegalAlien;
    }

    public function setQIllegalAlien(?string $qIllegalAlien): void
    {
        $this->qIllegalAlien = $qIllegalAlien;
    }

    public function getQAlienException(): ?string
    {
        return $this->qAlienException;
    }

    public function setQAlienException(?string $qAlienException): void
    {
        $this->qAlienException = $qAlienException;
    }

    public function getHasUPIN(): ?string
    {
        return $this->hasUPIN;
    }

    public function setHasUPIN(?string $hasUPIN): void
    {
        $this->hasUPIN = $hasUPIN;
    }

    public function getUpin(): ?string
    {
        return $this->upin;
    }

    public function setUpin(?string $upin): void
    {
        $this->upin = $upin;
    }

    public function getCitizenship(): ?string
    {
        return $this->citizenship;
    }

    public function setCitizenship(?string $citizenship): void
    {
        $this->citizenship = trim($citizenship);
    }

    public function getQResidentAlien(): ?string
    {
        return $this->qResidentAlien;
    }

    public function setQResidentAlien(?string $qResidentAlien): void
    {
        $this->qResidentAlien = trim($qResidentAlien);
    }

    public function getQRenouncedCitizenship(): ?string
    {
        return $this->qRenouncedCitizenship;
    }

    public function setQRenouncedCitizenship(?string $qRenouncedCitizenship): void
    {
        $this->qRenouncedCitizenship = trim($qRenouncedCitizenship);
    }

    public function getResidentAlienNo(): ?string
    {
        return $this->residentAlienNo;
    }

    public function setResidentAlienNo(?string $residentAlienNo): void
    {
        $this->residentAlienNo = trim($residentAlienNo);
    }
}