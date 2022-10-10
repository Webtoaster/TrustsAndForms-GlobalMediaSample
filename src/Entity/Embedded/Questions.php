<?php

declare(strict_types=1);

namespace App\Entity\Embedded;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable
 */
class Questions
{
    /**
     * Start of the 4473  questions.
     * 14 Transferee Questions
     * 14a.  a. Are you under indictment or information in any court for
     * a felony, or any other crime, for which the judge could imprison
     * you for more than one year? (See definition 1m)
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
     *     name="q_1_a",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $q1A = null;


    /**
     * 14b  b. Have you ever been convicted in any court for a
     * felony, or any other crime, for which the judge could have
     * imprisoned you for more than one year, even if you received
     * a shorter sentence including probation? (See definition 1m)
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
     *     name="q_1_b",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $q1B = null;


    /**
     * 14c  c. Are you a fugitive from justice? (See definition 1s)
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
     *     name="q_1_c",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $q1C = null;


    /**
     * 14d  d. Are you an unlawful user of, or addicted to, marijuana or
     * any depressant, stimulant, narcotic drug, or any other controlled
     * substance? Warning:  The use or possession of marijuana remains
     * unlawful under Federal law regardless of whether it has been
     * legalized or decriminalized for medicinal or recreational purposes
     * in the state where you reside.
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
     *     name="q_1_d",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $q1D = null;


    /**
     * 14e  e. Have you ever been adjudicated as a mental defective or
     * have you ever been committed to a mental institution?
     * (See definitions 1n and 1o)
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
     *     name="q_1_e",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $q1E = null;


    /**
     * 14f   f. Have you been discharged from the Armed Forces under dishonorable
     * conditions?
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
     *     name="q_1_f",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $q1F = null;


    /**
     * 14g   g. Are you subject to a court order restraining you from harassing,
     * stalking, or threatening your child or an intimate partner or child of
     * such partner? (See definition 1p)
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
     *     name="q_1_g",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $q1G = null;


    /**
     * 14h   h. Have you ever been convicted in any court of a misdemeanor
     * crime of domestic violence? (See definition 1q)
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
     *     name="q_1_h",
     *     type="string",
     *     length=3,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $q1H = null;


    public function getQ1A(): ?string
    {
        return $this->q1A;
    }


    public function setQ1A(?string $q1A): void
    {
        $this->q1A = $q1A;
    }


    public function getQ1B(): ?string
    {
        return $this->q1B;
    }


    public function setQ1B(?string $q1B): void
    {
        $this->q1B = $q1B;
    }


    public function getQ1C(): ?string
    {
        return $this->q1C;
    }


    public function setQ1C(?string $q1C): void
    {
        $this->q1C = $q1C;
    }


    public function getQ1D(): ?string
    {
        return $this->q1D;
    }


    public function setQ1D(?string $q1D): void
    {
        $this->q1D = $q1D;
    }


    public function getQ1E(): ?string
    {
        return $this->q1E;
    }


    public function setQ1E(?string $q1E): void
    {
        $this->q1E = $q1E;
    }


    public function getQ1F(): ?string
    {
        return $this->q1F;
    }


    public function setQ1F(?string $q1F): void
    {
        $this->q1F = $q1F;
    }


    public function getQ1G(): ?string
    {
        return $this->q1G;
    }


    public function setQ1G(?string $q1G): void
    {
        $this->q1G = $q1G;
    }


    public function getQ1H(): ?string
    {
        return $this->q1H;
    }


    public function setQ1H(?string $q1H): void
    {
        $this->q1H = $q1H;
    }


}