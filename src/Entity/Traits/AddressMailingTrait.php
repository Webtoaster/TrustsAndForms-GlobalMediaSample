<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use App\Service\Options;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait AddressMailingTrait
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
     *     name="mail_line_1",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address line 1"}
     * )
     */
    private ?string $mailLine1 = null;

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
     *     name="mail_line_2",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address line 2"}
     * )
     */
    private ?string $mailLine2 = null;

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
     *     name="mail_city",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address city"}
     * )
     */
    private ?string $mailCity = null;

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
     *     name="mail_state",
     *     type="string",
     *     length=2,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address state"}
     * )
     */
    private ?string $mailState = null;

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
     *     name="mail_zipcode",
     *     type="string",
     *     length=10,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Zipcode"}
     * )
     */
    private ?string $mailZipcode = null;

    public function getMailLine1(): ?string
    {
        return $this->mailLine1;
    }

    public function setMailLine1(?string $mailLine1): void
    {
        $this->mailLine1 = $mailLine1;
    }

    public function getMailLine2(): ?string
    {
        return $this->mailLine2;
    }

    public function setMailLine2(?string $mailLine2): void
    {
        $this->mailLine2 = $mailLine2;
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

    public function getMailZipcode(): ?string
    {
        return $this->mailZipcode;
    }

    public function setMailZipcode(?string $mailZipcode): void
    {
        $this->mailZipcode = $mailZipcode;
    }

}