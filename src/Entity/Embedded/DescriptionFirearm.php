<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable
 */
class DescriptionFirearm
{
    /**
     * TODO Fix error messages for Asserts
     * @Assert\NotBlank(
     *     groups={
     *        "f1_req",
     *        "f4_req",
     *        "f5_req",
     *     },
     *     allowNull=true,
     *     normalizer="trim",
     *     message=""
     * )
     * @Assert\Regex(
     *     groups={
     *        "f1_req",
     *        "f4_req",
     *        "f5_req",
     *        "caliber_req",
     *     },
     *     pattern="/^[a-zA-Z0-9\s.\/\-_,]+$/si",
     *     match=false,
     *     message=""
     * )
     * @ORM\Column(
     *     name="caliber",
     *     type="string",
     *     length=16,
     *     nullable=true,
     *     options={"fixed"=false,"comment"="Caliber of item"}
     * )
     */
    private ?string $caliber = null;

    /**
     * @Assert\Choice(
     *     groups={
     *        "f1_req",
     *        "f4_req",
     *        "f5_req",
     *        "caliber_unit_req"
     *     },
     *     callback={"App\Service\Options", "VALID_CALIBER_MEASUREMENT"},
     *     message="Choose a valid option."
     * )
     * @ORM\Column(
     *     name="caliber_unit",
     *     type="string",
     *     length=16,
     *     nullable=true,
     *     options={"fixed"=false,"comment"=""}
     * )
     */
    private ?string $caliberUnit = null;

    /**
     * @Assert\IsNull(
     *     groups={
     *        "supressor_null",
     *     },
     *     message="The Barrel Length is Not Set for Suppressors."
     * )
     * @Assert\NotBlank(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "barrel_length_req"
     *     },
     *     allowNull=true,
     *     normalizer="trim",
     *     message=""
     * )
     * @Assert\Regex(
     *     groups={
     *          "",
     *     },
     *     pattern="/^[a-zA-Z0-9\s.\/\-_,]+$/si",
     *     match=false,
     *     message=""
     * )
     * @ORM\Column(
     *     name="length_barrel",
     *     type="string",
     *     length=16,
     *     nullable=true,
     *     options={"fixed"=false,"comment"="Length of Barrel"}
     * )
     */
    private ?string $lengthBarrel = null;

    /**
     * @Assert\NotBlank(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *     },
     *     allowNull=true,
     *     normalizer="trim",
     *     message=""
     * )
     * @Assert\Regex(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *     },
     *     pattern="/^[a-zA-Z0-9\s.\/\-_,]+$/si",
     *     match=false,
     *     message=""
     * )
     * @ORM\Column(
     *     name="length_overall",
     *     type="string",
     *     length=16,
     *     nullable=true,
     *     options={"fixed"=false,"comment"="Overall Length"}
     * )
     */
    private ?string $lengthOverall = null;


    /**
     * @return string|null
     */
    public function getCaliber(): ?string
    {
        return $this->caliber;
    }

    /**
     * @param  ?string $caliber
     */
    public function setCaliber(?string $caliber): void
    {
        $this->caliber = $caliber;
    }

    /**
     * @return string|null
     */
    public function getCaliberUnit(): ?string
    {
        return $this->caliberUnit;
    }

    /**
     * @param  ?string $caliberUnit
     */
    public function setCaliberUnit(?string $caliberUnit): void
    {
        $this->caliberUnit = $caliberUnit;
    }

    /**
     * @return string|null
     */
    public function getLengthBarrel(): ?string
    {
        return $this->lengthBarrel;
    }

    /**
     * @param  ?string $lengthBarrel
     */
    public function setLengthBarrel(?string $lengthBarrel): void
    {
        $this->lengthBarrel = $lengthBarrel;
    }

    /**
     * @return string|null
     */
    public function getLengthOverall(): ?string
    {
        return $this->lengthOverall;
    }

    /**
     * @param  ?string $lengthOverall
     */
    public function setLengthOverall(?string $lengthOverall): void
    {
        $this->lengthOverall = $lengthOverall;
    }


}