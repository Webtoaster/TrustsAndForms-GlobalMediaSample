<?php

declare(strict_types=1);

namespace App\Entity\Embedded;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Embeddable
 */
class NameSimple
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
     *     name="name",
     *     type="string",
     *     length=128,
     *     nullable=false,
     *     options={"comment"="Company or Trust Name of the Entity"}
     * )
     */
    private ?string $name = null;


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = trim($name);
    }


}