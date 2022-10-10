<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait TitleTrait
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
     *     name="title",
     *     type="string",
     *     length=50,
     *     nullable=true,
     *     options={"comment"="A partys title"}
     * )
     */
    private ?string $title = null;


    public function getTitle(): ?string
    {
        return $this->title;
    }


    public function setTitle(?string $title): void
    {
        $this->title = trim($title);
    }
}