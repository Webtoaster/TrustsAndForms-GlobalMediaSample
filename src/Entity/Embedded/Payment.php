<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use App\Service\Options;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Embeddable
 */
class Payment
{

    /**
     * @Assert\Choice(
     *     choices=Options::VALID_PAYMENT_METHODS,
     *     message="Please choose option.")
     * @ORM\Column(
     *     name="method",
     *     type="string",
     *     length=6,
     *     nullable=true,
     *     options={"fixed"=true, "comment"="Payment Methods"})
     */
    private ?string $method = null;

    /**
     * @Assert\Choice(
     *     groups={
     *        "cc_dates_req"
     *     },
     *     choices=Options::VALID_MONTHS,
     *     message="Please select a valid Expiration Month.")
     * @ORM\Column(
     *     name="exp_month",
     *     type="string",
     *     length=2,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Credit Card Expiration Month"})
     */
    private ?string $expMonth = null;

    //  TODO ADD CC and other similar elements.

    /**
     * @Assert\Choice(
     *     groups={
     *        "cc_dates_req"
     *     },
     *     callback={"App\Service\Options", "getPaymentYears"},
     *     message="Please select a valid Expiration Year.")
     *
     * @ORM\Column(
     *     name="exp_year",
     *     type="string",
     *     length=4,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="Credit Card Expiration Year"})
     */
    private ?string $expYear = null;

    /**
     * @var string|null
     * @Assert\Length(
     *     groups={
     *          "cc_payment",
     *     },
     *     min="15",
     *     max="16",
     *     minMessage="Credit Cards cannot be shorter than {{ limit }} characters.)",
     *     maxMessage="Credit Cards cannot be longer than {{ limit }} characters.)",
     * )
     * @Assert\Regex(
     *     groups={
     *          "cc_payment",
     *     },
     *     pattern="/^\d+$/",
     *     message="Whole Numbers "
     * )
     */
    private ?string $cc = null;

    public function getCc(): ?string
    {
        return $this->cc;
    }


    public function setCc(?string $cc): void
    {
        $this->cc = $cc;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }


    public function setMethod(?string $method): void
    {
        $this->method = trim($method);
    }


    public function getExpMonth(): ?string
    {
        return $this->expMonth;
    }


    public function setExpMonth(?string $expMonth): void
    {
        $this->expMonth = trim($expMonth);
    }


    public function getExpYear(): ?string
    {
        return $this->expYear;
    }


    public function setExpYear(?string $expYear): void
    {
        $this->expYear = trim($expYear);
    }


}