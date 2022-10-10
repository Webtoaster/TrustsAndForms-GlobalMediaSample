<?php

namespace App\Entity\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

trait TrackingTrait
{
    /**
     * @var DateTime
     * @Assert\DisableAutoMapping()
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected DateTime $createdAt;

    /**
     * @var DateTime
     * @Assert\DisableAutoMapping()
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    protected DateTime $updatedAt;


    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }


    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }


    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
}