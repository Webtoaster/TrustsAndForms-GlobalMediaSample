<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use App\Service\Options;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait AddressPhysicalTrait
{
    /**
     * @Assert\NotBlank(
     *     groups={
     *          "reg",
     *          "f145_clo",
     *          "f145_payee",
     *          "f1_req_applicant",
     *          "f1_req_non_po_box",
     *          "f4_req_transferee",
     *          "f4_req_transferor",
     *          "f4_req_transferor_premises",
     *          "f4_req_decedent",
     *          "f5_req_transferee",
     *          "f5_req_transferor",
     *          "f5_req_transferor_premises",
     *          "f5_req_decedent",
     *
     *          "signup",
     *          "address_required",
     *          "address_all"
     *   },
     *     normalizer="trim",
     *     message="Line 1 of the Address field cannot be blank."
     * )
     * @Assert\Length(
     *     groups={
     *          "reg",
     *          "f145_clo",
     *          "f145_payee",
     *          "f1_req_applicant",
     *          "f1_req_non_po_box",
     *          "f4_req_transferee",
     *          "f4_req_transferor",
     *          "f4_req_transferor_premises",
     *          "f4_req_decedent",
     *          "f5_req_transferee",
     *          "f5_req_transferor",
     *          "f5_req_transferor_premises",
     *          "f5_req_decedent",
     *
     *          "signup",
     *          "address_required",
     *          "address_all"
     *   },
     *     normalizer="trim",
     *     min="4",
     *     max="128",
     *     minMessage="Line 1 of the Address must be at least {{ limit }} characters long.)",
     *     maxMessage="Line 1 of the Address cannot be longer than {{ limit }} characters.)"
     * )
     * @Assert\Regex(
     *     groups={"address_all"},
     *     normalizer="trim",
     *     pattern="/^[a-zA-Z0-9\s.\/\-_,]+$/si",
     *     match=false,
     *     message="Line 1 of the Address may contain only alpha-numeric characters."
     * )
     * @ORM\Column(
     *     name="physical_line_1",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address line 1"}
     * )
     */
    private ?string $physicalLine1 = null;

    /**
     * @Assert\NotBlank(
     *     groups={"address_2_required"},
     *     normalizer="trim",
     *     message="Line 2 of the Address field cannot be blank."
     * )
     * @Assert\Length(
     *     groups={
     *          "address_2_required"
     *      },
     *     normalizer="trim",
     *     min="6",
     *     max="128",
     *     minMessage="Line 2 of your Address must be at least {{ limit }} characters long.)",
     *     maxMessage="Line 2 of your Address cannot be longer than {{ limit }} characters.)",
     *     normalizer="trim"
     * )
     * @Assert\Regex(
     *     groups={"address_all"},
     *     normalizer="trim",
     *     pattern="/^[a-zA-Z0-9\s.\/\-_,]+$/si",
     *     match=false,
     *     message="Line 2 of the Address may contain only alpha-numeric characters or spaces."
     * )
     * @ORM\Column(
     *     name="physical_line_2",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address line 2"}
     * )
     */
    private ?string $physicalLine2 = null;

    /**
     * @Assert\NotBlank(
     *     groups={
     *          "reg",
     *          "f145_clo",
     *          "f145_payee",
     *          "f1_req_applicant",
     *          "f1_req_non_po_box",
     *          "f4_req_transferee",
     *          "f4_req_transferor",
     *          "f4_req_transferor_premises",
     *          "f4_req_decedent",
     *          "f5_req_transferee",
     *          "f5_req_transferor",
     *          "f5_req_transferor_premises",
     *          "f5_req_decedent",
     *
     *          "signup",
     *          "address_required",
     *          "address_all"
     *   },
     *     normalizer="trim",
     *     message="Please enter the City."
     * )
     * @Assert\Length(
     *     groups={
     *          "reg",
     *          "f145_clo",
     *          "f145_payee",
     *          "f1_req_applicant",
     *          "f1_req_non_po_box",
     *          "f4_req_transferee",
     *          "f4_req_transferor",
     *          "f4_req_transferor_premises",
     *          "f4_req_decedent",
     *          "f5_req_transferee",
     *          "f5_req_transferor",
     *          "f5_req_transferor_premises",
     *          "f5_req_decedent",
     *
     *          "signup",
     *          "address_required",
     *          "address_all"
     *   },
     *     normalizer="trim",
     *     min="2",
     *     max="128",
     *     minMessage="The City must be at least {{ limit }} characters long.)",
     *     maxMessage="The City cannot be longer than {{ limit }} characters.)",
     * )
     * @Assert\Regex(
     *     groups={"address_all"},
     *     normalizer="trim",
     *     pattern="/^[a-zA-Z\s.\-_,]+$/",
     *     match=false,
     *     message="The City field may contain only alpha-numeric characters or spaces."
     * )
     * @ORM\Column(
     *     name="physical_city",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address city"}
     * )
     */
    private ?string $physicalCity = null;

    /**
     * @Assert\Choice(
     *     groups={
     *          "reg",
     *          "f145_clo",
     *          "f145_payee",
     *          "f1_req_applicant",
     *          "f1_req_non_po_box",
     *          "f4_req_transferee",
     *          "f4_req_transferor",
     *          "f4_req_transferor_premises",
     *          "f4_req_decedent",
     *          "f5_req_transferee",
     *          "f5_req_transferor",
     *          "f5_req_transferor_premises",
     *          "f5_req_decedent",
     *
     *          "signup",
     *          "address_required",
     *          "address_all"
     *   },
     *     choices=Options::VALID_STATES,
     *     message="Choose a valid state."
     * )
     * @ORM\Column(
     *     name="physical_state",
     *     type="string",
     *     length=2,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address state"}
     * )
     */
    private ?string $physicalState = null;

    /**
     * @Assert\NotBlank(
     *     groups={
     *          "reg",
     *          "f145_clo",
     *          "f145_payee",
     *          "f1_req_applicant",
     *          "f1_req_non_po_box",
     *          "f4_req_transferee",
     *          "f4_req_transferor",
     *          "f4_req_transferor_premises",
     *          "f4_req_decedent",
     *          "f5_req_transferee",
     *          "f5_req_transferor",
     *          "f5_req_transferor_premises",
     *          "f5_req_decedent",
     *
     *          "signup",
     *          "address_required",
     *          "address_all"
     *   },
     *     normalizer="trim",
     *     message="Required in Zip Code or Zip Code+4 format, i.e. 99999 or 99999-9999."
     * )
     * @Assert\Length(
     *     groups={
     *          "reg",
     *          "f145_clo",
     *          "f145_payee",
     *          "f1_req_applicant",
     *          "f1_req_non_po_box",
     *          "f4_req_transferee",
     *          "f4_req_transferor",
     *          "f4_req_transferor_premises",
     *          "f4_req_decedent",
     *          "f5_req_transferee",
     *          "f5_req_transferor",
     *          "f5_req_transferor_premises",
     *          "f5_req_decedent",
     *
     *          "signup",
     *          "address_required",
     *          "address_all"
     *   },
     *     normalizer="trim",
     *     min="5",
     *     max="10",
     *     minMessage="Required in Zip Code or Zip Code+4 format, i.e. 99999 or 99999-9999.",
     *     maxMessage="Required in Zip Code or Zip Code+4 format, i.e. 99999 or 99999-9999.)",
     * )
     * @Assert\Regex(
     *     groups={"address_all"},
     *     normalizer="trim",
     *     pattern="/^[0-9\-]+$/",
     *     match=false,
     *     message="Required in Zip Code or Zip Code+4 format, i.e. 99999 or 99999-9999."
     * )
     * @ORM\Column(
     *     name="physical_zipcode",
     *     type="string",
     *     length=10,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Zipcode"}
     * )
     */
    private ?string $physicalZipcode = null;

    public function getPhysicalLine1(): ?string
    {
        return $this->physicalLine1;
    }

    public function setPhysicalLine1(?string $physicalLine1): void
    {
        $this->physicalLine1 = $physicalLine1;
    }

    public function getPhysicalLine2(): ?string
    {
        return $this->physicalLine2;
    }

    public function setPhysicalLine2(?string $physicalLine2): void
    {
        $this->physicalLine2 = $physicalLine2;
    }

    public function getPhysicalCity(): ?string
    {
        return $this->physicalCity;
    }

    public function setPhysicalCity(?string $physicalCity): void
    {
        $this->physicalCity = $physicalCity;
    }

    public function getPhysicalState(): ?string
    {
        return $this->physicalState;
    }

    public function setPhysicalState(?string $physicalState): void
    {
        $this->physicalState = $physicalState;
    }

    public function getPhysicalZipcode(): ?string
    {
        return $this->physicalZipcode;
    }

    public function setPhysicalZipcode(?string $physicalZipcode): void
    {
        $this->physicalZipcode = $physicalZipcode;
    }




}