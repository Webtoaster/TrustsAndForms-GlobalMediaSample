<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class ATFForm
{
    /**
     * Form 4's government printing office form id
     * @ORM\Column(
     *     name="omb_form_id",
     *     type="string",
     *     length=32,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $ombFormId = null;

    /**
     * @ORM\Column(
     *     name="name_atf_form ",
     *     type="string",
     *     length=32,
     *     nullable=true,
     *     options={"fixed"=true,"comment"="NameSimple of the ATF Form, ie Form 4"}
     * )
     */
    private ?string $nameATFForm = null;

    public function getOmbFormId(): ?string
    {
        return $this->ombFormId;
    }

    public function setOmbFormId(?string $ombFormId): void
    {
        $this->ombFormId = $ombFormId;
    }

    public function getNameATFForm(): ?string
    {
        return $this->nameATFForm;
    }

    public function setNameATFForm(?string $nameATFForm): void
    {
        $this->nameATFForm = $nameATFForm;
    }

}