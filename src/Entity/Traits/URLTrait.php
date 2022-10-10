<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


trait URLTrait
{

    /**
     * @Assert\Url(
     *     message="Please enter a valid Web Site Address."
     * )
     *
     * @Assert\NotBlank(
     *     groups={"url_required"},
     *     message="Please enter a valid Web Site Address.")
     *
     * @ORM\Column(
     *     name="url",
     *     type="string",
     *     length=255,
     *     nullable=true,
     *     options={"comment"="Web Site URL"})
     */
    private ?string $url = null;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }
}
