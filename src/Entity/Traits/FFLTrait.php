<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait FFLTrait
{
    /**
     * @ORM\Column(
     *     name="ffl_section_1",
     *     type="string",
     *     length=6,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $fflSection1 = null;

    /**
     * @ORM\Column(
     *     name="ffl_section_2",
     *     type="string",
     *     length=2,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $fflSection2 = null;

    /**
     * @ORM\Column(
     *     name="ffl_section_3",
     *     type="string",
     *     length=2,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $fflSection3 = null;

    /**
     * @ORM\Column(
     *     name="ffl_section_4",
     *     type="string",
     *     length=5,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $fflSection4 = null;

    /**
     * @ORM\Column(
     *     name="ein",
     *     type="string",
     *     length=10,
     *     nullable=true,
     *     options={"fixed"=false,"comment"="XX-XXXXXXX"}
     * )
     */
    private ?string $ein = null;

    /**
     * @ORM\Column(
     *     name="class",
     *     type="string",
     *     length=16,
     *     nullable=true,
     *     options={"fixed"=true}
     * )
     */
    private ?string $class = null;

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function getEin(): ?string
    {
        return $this->ein;
    }

    public function getFflSection1(): ?string
    {
        return $this->fflSection1;
    }

    public function getFflSection2(): ?string
    {
        return $this->fflSection2;
    }

    public function getFflSection3(): ?string
    {
        return $this->fflSection3;
    }

    public function getFflSection4(): ?string
    {
        return $this->fflSection4;
    }

    public function setClass(?string $class): void
    {
        $this->class = trim($class);
    }

    public function setEin(?string $ein): void
    {
        $this->ein = trim($ein);
    }

    public function setFflSection1(?string $fflSection1): void
    {
        $this->fflSection1 = $fflSection1;
    }

    public function setFflSection2(?string $fflSection2): void
    {
        $this->fflSection2 = $fflSection2;
    }

    public function setFflSection3(?string $fflSection3): void
    {
        $this->fflSection3 = $fflSection3;
    }

    public function setFflSection4(?string $fflSection4): void
    {
        $this->fflSection4 = $fflSection4;
    }
}