<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use App\Service\Options;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable
 */
class Address
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
     *     name="line_1",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address line 1"}
     * )
     */
    private ?string $line1 = null;

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
     *     name="line_2",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address line 2"}
     * )
     */
    private ?string $line2 = null;

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
     *     name="city",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address city"}
     * )
     */
    private ?string $city = null;

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
     *     name="state",
     *     type="string",
     *     length=2,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Address state"}
     * )
     */
    private ?string $state = null;

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
     *     name="zipcode",
     *     type="string",
     *     length=10,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Zipcode"}
     * )
     */
    private ?string $zipcode = null;

    /**
     * TODO Kill this off and use the normalizing service.
     */
    private function getAddress(?string $lineEnding): ?string
    {
        if ($lineEnding === 'html') {
            $ending = "<br/>";
        } elseif ($lineEnding === 'pdf') {
            $ending = "\r\n";
        } else {
            $ending = ", ";
        }

        //  Concatenate the address together if these fields are not null.
        $address = "";
        if (trim($this->getLine1()) !== '') {
            $address .= trim($this->getLine1()).$ending;
        }
        if (trim($this->getLine2()) !== '') {
            $address .= trim($this->getLine2()).$ending;
        }

        if (
            trim($this->getCity()) !== ''
            && trim($this->getState()) !== ''
            && trim($this->getZipcode()) !== ''
        ) {
            $address .= trim($this->getCity()).", ".trim($this->getState())." "
                .trim(
                    $this->getZipCode()
                );
        }

        return $address;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getHtmlAddress(): ?string
    {
        return $this->getAddress('html');
    }

    public function getLine1(): ?string
    {
        return $this->line1;
    }

    public function getLine2(): ?string
    {
        return $this->line2;
    }

    public function getPdfAddress(): ?string
    {
        return $this->getAddress('pdf');
    }

    public function getSingleLineAddress(): ?string
    {
        return $this->getAddress('');
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @return string|null
     */
    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    /**
     * Normalizes Zip Code strings.
     *
     * @param string $zipcode
     *
     * @return string
     */
    private function normalizeZipCode(string $zipcode): string
    {
        $zipcode = trim($zipcode);

        if (strlen($zipcode) === 10 || strlen($zipcode) === 5) {
            return $zipcode;
        }

        if (strlen($zipcode) === 9) {
            $zipcode = substr($zipcode, 0, 5).'-'.substr($zipcode, -4, 4);
        }

        return $zipcode;
    }

    public function setCity(?string $city): void
    {
        $this->city = trim($city);
    }

    public function setLine1(?string $line1): void
    {
        $this->line1 = trim($line1);
    }

    public function setLine2(?string $line2): void
    {
        $this->line2 = $line2;
    }

    public function setState(?string $state): void
    {
        $this->state = trim($state);
    }

    public function setZipcode(?string $zipcode): void
    {
        $this->zipcode = $this->normalizeZipCode($zipcode);
    }

}