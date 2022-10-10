<?php

declare(strict_types=1);

namespace App\Entity\Embedded;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Embeddable
 */
class EthnicityRace
{

    /**
     * 17a Ethnicity - Enumerated
     *      Hispanic or Latino
     *      Non-Hispanic or Latino
     *      It is either Latino or Other in OptionEthnicity
     * @Assert\Choice(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req",
     *        "frp_req",
     * },
     *     callback={"App\Service\Options", "VALID_ETHNICITY"},
     *     message="Choose a valid option."
     * )
     * @ORM\Column(
     *     name="ethnicity",
     *     type="string",
     *     length=6,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $ethnicity = null;


    /**
     * 17b. Race - Enumerated from OptionRace
     *    case native = 'American Indian or Alaska Native';
     *    case asian = 'Asian';
     *    case black = 'African American';
     *    case islander = 'Native Hawaiian or Other Pacific Islander';
     *    case white = 'White';
     * @Assert\Choice(
     *     groups={
     *        "f1_ind_req",
     *        "f4_ind_req",
     *        "f5_ind_req",
     *        "frp_org_req",
     *        "frp_req",
     * },
     *     callback={"App\Service\Options", "VALID_RACE"},
     *     message="Choose a valid option."
     * )
     * @ORM\Column(
     *     name="race",
     *     type="string",
     *     length=8,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $race = null;


    public function getEthnicity(): ?string
    {
        return $this->ethnicity;
    }


    public function setEthnicity(?string $ethnicity): void
    {
        $this->ethnicity = $ethnicity;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }


    public function setRace(?string $race): void
    {
        $this->race = $race;
    }

}