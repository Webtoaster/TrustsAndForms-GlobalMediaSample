<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sessions
 * @ORM\Table(name="sessions")
 */
class Sessions
{

    /**
     * @ORM\Column(
     *     name="sess_id",
     *     type="string",
     *     length=128,
     *     nullable=false,)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private string $sessId;

    /**
     * @var string|null
     *
     * @ORM\Column(
     *     name="sess_data",
     *     type="blob",
     *     length=65535,
     *     nullable=false,)
     */
    private mixed $sessData;

    /**
     * @ORM\Column(
     *     name="sess_time",
     *     type="integer",
     *     nullable=false,
     *     options={"unsigned"=true})
     */
    private int $sessTime;

    /**
     * @ORM\Column(
     *     name="sess_lifetime",
     *     type="integer",
     *     nullable=false,)
     */
    private int $sessLifetime;

    public function getSessId(): string
    {
        return $this->sessId;
    }

    public function setSessId(string $sessId): void
    {
        $this->sessId = $sessId;
    }

    public function getSessData(): mixed
    {
        return $this->sessData;
    }

    public function setSessData(mixed $sessData): void
    {
        $this->sessData = $sessData;
    }

    public function getSessTime(): int
    {
        return $this->sessTime;
    }

    public function setSessTime(int $sessTime): void
    {
        $this->sessTime = $sessTime;
    }

    public function getSessLifetime(): int
    {
        return $this->sessLifetime;
    }

    public function setSessLifetime(int $sessLifetime): void
    {
        $this->sessLifetime = $sessLifetime;
    }

}