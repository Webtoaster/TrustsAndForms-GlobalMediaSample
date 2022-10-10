<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use App\Service\Options;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Embeddable
 */
class Fee
{
    /**
     * @Assert\NotBlank(
     *     groups={
     *        "f1_req",
     *        "f4_req",
     *        "f5_req",
     *     },
     *     allowNull=true,
     *     normalizer="trim",
     *     message="Required: Fee"
     * )
     * @Assert\Choice(
     *     choices=Options::VALID_TRANSFER_FEE,
     *     message="Please Select the Transfer Fee."
     *     )
     * @ORM\Column(
     *     name="fee",
     *     type="decimal",
     *     precision=13,
     *     scale=2,
     *     nullable=true,
     *     options={"default"="0.00","comment"="ATF Tranfer Fee."}
     * )
     */
    private ?float $fee = null;


    public function getFee(): ?float
    {
        return $this->fee;
    }


    public function setFee(?float $fee): void
    {
        $this->fee = $fee;
    }


}