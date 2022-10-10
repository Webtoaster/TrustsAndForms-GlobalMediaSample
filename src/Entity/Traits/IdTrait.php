<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait IdTrait
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(
     *     name="id",
     *     type="bigint",
     *     unique=true,
     *     nullable="false",
     *      options={
     *          "unsigned"=true,
     *          "comment"="Primary Key table/entity."
     *      }
     * )
     */
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}