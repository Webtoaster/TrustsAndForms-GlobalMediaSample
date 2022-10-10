<?php

declare(strict_types=1);

namespace App\Entity\Embedded;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Embeddable
 */
class DescriptionCommon
{
    /**
     * @Assert\NotBlank(
     *     groups={
     *        "f1_req",
     *        "f4_req",
     *        "f5_req",
     *     },
     *     allowNull=true,
     *     normalizer="trim",
     *     message=""
     * )
     * @Assert\Regex(
     *     groups={
     *     "all",
     *     "model_no_req",
     *     "model_no_optional"
     *      },
     *     normalizer="trim",
     *     pattern="/^[a-zA-Z0-9\s.\/\-_,]+$/si",
     *     match=false,
     *     message="Model Number can only be letters, numbers, spaces and punctuation characters."
     * )
     * @ORM\Column(
     *     name="model",
     *     type="string",
     *     length=32,
     *     nullable=true,
     *     options={"fixed"=false,"comment"="Model of the Property"}
     * )
     */
    private ?string $model = null;

    /**
     * @Assert\NotBlank(
     *     groups={
     *        "f1_req",
     *        "f4_req",
     *        "f5_req",
     *     },
     *     allowNull=true,
     *     normalizer="trim",
     *     message=""
     * )
     * @Assert\Regex(
     *     groups={
     *     "all",
     *     "sn_all",
     *     "sn_optional"
     * },
     *     normalizer="trim",
     *     pattern="/^[a-zA-Z0-9\s.\/\-_,]+$/si",
     *     match=false,
     *     message="Serial Number can only be letters, numbers, spaces and punctuation characters."
     * )
     * @ORM\Column(
     *     name="serial_no",
     *     type="string",
     *     length=32,
     *     nullable=true,
     *     options={"fixed"=false,"comment"="Serial Number"}
     * )
     */
    private ?string $serialNo = null;

    /**
     * @Assert\Regex(
     *     groups={
     *     "description_all",
     *     "description_optional"
     * },
     *     normalizer="trim",
     *     pattern="/^[a-zA-Z0-9\s.\/\-_,]+$/si",
     *     match=false,
     *     message="Description can only be letters, numbers, spaces and punctuation characters."
     * )
     * @ORM\Column(
     *     name="description",
     *     type="text",
     *     length="1000",
     *     nullable=true,
     *     options={"comment"="Description of the property in long form."}
     * )
     */
    private ?string $description = null;

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): void
    {
        $this->model = trim($model);
    }

    public function getSerialNo(): ?string
    {
        return $this->serialNo;
    }

    public function setSerialNo(?string $serialNo): void
    {
        $this->serialNo = trim($serialNo);
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = trim($description);
    }


}