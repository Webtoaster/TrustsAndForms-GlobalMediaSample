<?php

declare(strict_types=1);

namespace App\Entity\Traits;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



trait CompanyTrait
{
    /**
     * @Assert\NotBlank(
     *     groups={"trust_name_required", "company_name_required"},
     *     normalizer="trim",
     *     message="The Name cannot be blank."
     * )
     * @Assert\Length(
     *     groups={"trust_name_required", "company_name_required"},
     *     normalizer="trim",
     *     min="8",
     *     max="128",
     *     minMessage="The Name must be at least {{ limit }} characters long.)",
     *     maxMessage="The Name cannot be longer than {{ limit }} characters.)"
     * )
     * @Assert\Regex(
     *     groups={"trust_name_all", "company_name_all"},
     *     normalizer="trim",
     *     pattern="/^[a-zA-Z0-9\s.\/\-_,]+$/si",
     *     match=false,
     *     message="The Name may contain only alpha-numeric characters."
     * )
     * @ORM\Column(
     *     name="company_name",
     *     type="string",
     *     length=128,
     *     nullable=true,
     *     options={"comment"="Company or Trust Name of the Entity"}
     * )
     */
    private ?string $company = null;

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }



}