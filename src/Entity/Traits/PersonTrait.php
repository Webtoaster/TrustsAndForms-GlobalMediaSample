<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait PersonTrait
{

    /**
     * @Assert\NotBlank(
     *     groups={"name_required_first"},
     *     message="First NameSimple is Required.",
     * )
     * @Assert\Length(
     *     groups={"name_required_first"},
     *     min = 1,
     *     max = 32,
     *     minMessage = "The First NameSimple must be at least {{ limit }} characters in Length.",
     *     maxMessage = "The First NameSimple must be no longer than {{ limit }} characters in Length."
     * )
     * @Assert\Regex(
     *     groups={"name_person"},
     *     pattern="/^[a-zA-Z\-]+$/g",
     *     match=false,
     *     message="Please enter only Letters in the First NameSimple.",
     * )
     * @ORM\Column(
     *     name="first",
     *     type="string",
     *     length=32,
     *     nullable=true,
     *     options={"comment"="First NameSimple of Party."}
     * )
     */
    private ?string $first = null;

    /**
     * @Assert\NotBlank(
     *     groups={"name_required_middle"},
     *     message="Middle NameSimple is Required.",
     * )
     * @Assert\Length(
     *     groups={"name_required_middle"},
     *     min = 1,
     *     max = 32,
     *     minMessage = "The Middle NameSimple must be at least {{ limit }} characters in Length.",
     *     maxMessage = "The Middle NameSimple must be no longer than {{ limit }} characters in Length."
     * )
     * @Assert\Regex(
     *     groups={"name_person"},
     *     pattern="/^[a-zA-Z\-]+$/g",
     *     match=false,
     *     message="Please enter only Letters in the Middle NameSimple.",
     * )
     * @ORM\Column(
     *     name="middle",
     *     type="string",
     *     length=32,
     *     nullable=true,
     *     options={"comment"="Middle NameSimple"}
     * )
     */
    private ?string $middle = null;

    /**
     * @Assert\NotBlank(
     *     groups={"name_required_last"},
     *     message="You must enter a Last NameSimple.",
     * )
     * @Assert\Length(
     *     groups={"name_required_last"},
     *     min = 1,
     *     max = 32,
     *     minMessage = "The Last NameSimple must be at least {{ limit }} characters in Length.",
     *     maxMessage = "The Last NameSimple must be no longer than {{ limit }} characters in Length."
     * )
     * @Assert\Regex(
     *     groups={"name_person"},
     *     pattern="/^[a-zA-Z\-]+$/g",
     *     match=false,
     *     message="Please enter only Letters in the Last NameSimple.",
     * )
     * @ORM\Column(
     *      name="last",
     *      type="string",
     *      length=32,
     *      nullable=true,
     *      options={"comment"="last name"}
     * )
     */
    private ?string $last = null;

    /**
     * @Assert\Regex(
     *     groups={"name_person"},
     *     pattern="/^[a-zA-Z\-]+$/g",
     *     match=false,
     *     message="Please enter only Letters in the First Name.",
     * )
     * @ORM\Column(
     *     name="suffix",
     *     type="string",
     *     length=12,
     *     nullable=true,
     *     options={"comment"="suffix"}
     * )
     */
    private ?string $suffix = null;

    public function getFirst(): ?string
    {
        return $this->first;
    }

    public function getMiddle(): ?string
    {
        return $this->middle;
    }

    public function getLast(): ?string
    {
        return $this->last;
    }

    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    public function setFirst(?string $first): void
    {
        $this->first = $first;
    }

    public function setMiddle(?string $middle): void
    {
        $this->middle = $middle;
    }

    public function setLast(?string $last): void
    {
        $this->last = $last;
    }

    public function setSuffix(?string $suffix): void
    {
        $this->suffix = $suffix;
    }

}