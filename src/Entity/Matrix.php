<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="matrix")
 * @ORM\Entity(repositoryClass="App\Repository\MatrixRepository")
 */
class Matrix
{
    use IdTrait;

    /**
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private ?string $name;

    /**
     * @ORM\Column(name="abv", type="string", length=2, nullable=false)
     */
    private ?string $abv;

    /**
     * @ORM\Column(name="mg", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private ?string $mg;

    /**
     * @ORM\Column(name="mg_ffl", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $mgFfl = false;

    /**
     * @ORM\Column(name="mg_flag", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $mgFlag = false;

    /**
     * @ORM\Column(name="supp", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private string $supp;

    /**
     * @ORM\Column(name="supp_ffl", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $suppFfl = false;

    /**
     * @ORM\Column(name="supp_flag", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $suppFlag = false;

    /**
     * @ORM\Column(name="sbr", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private string $sbr;

    /**
     * @ORM\Column(name="sbr_ffl", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $sbrFfl = false;

    /**
     * @ORM\Column(name="sbr_flag", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $sbrFlag = false;

    /**
     * @ORM\Column(name="sbs", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private ?string $sbs;

    /**
     * @ORM\Column(name="sbs_ffl", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $sbsFfl = false;

    /**
     * @ORM\Column(name="sbs_flag", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $sbsFlag = false;

    /**
     * @ORM\Column(name="aow", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private string $aow;

    /**
     * @ORM\Column(name="aow_ffl", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $aowFfl = false;

    /**
     * @ORM\Column(name="aow_flag", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $aowFlag = false;

    /**
     * @ORM\Column(name="dd", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private string $dd;

    /**
     * @ORM\Column(name="dd_ffl", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $ddFfl = false;

    /**
     * @ORM\Column(name="dd_flag", type="boolean", nullable=false, options={"comment"="Checkbox value for this Boolean Column."})
     */
    private bool $ddFlag = false;

    /**
     * @ORM\Column(name="notes", type="text", length=0, nullable=true)
     */
    private ?string $notes;

    /**
     * @ORM\Column(name="is_state", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private ?string $isState;

    /**
     * @ORM\Column(name="is_lower48", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private ?string $isLower48;

    /**
     * @ORM\Column(name="slug", type="string", length=64, nullable=false)
     */
    private string $slug;

    /**
     * @ORM\Column(name="latitude", type="float", precision=9, scale=6, nullable=true)
     */
    private float|null $latitude;

    /**
     * @ORM\Column(name="longitude", type="float", precision=9, scale=6, nullable=true)
     */
    private float|null $longitude;

    /**
     * @var int|null
     * @ORM\Column(name="population", type="integer", nullable=true)
     */
    private int|null $population;

    /**
     * @ORM\Column(name="area", type="float", precision=10, scale=0, nullable=true)
     */
    private float|null $area;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAbv(): string
    {
        return $this->abv;
    }

    public function setAbv(string $abv): void
    {
        $this->abv = $abv;
    }

    public function getMg(): string
    {
        return $this->mg;
    }

    public function setMg(string $mg): void
    {
        $this->mg = $mg;
    }

    public function isMgFfl(): bool
    {
        return $this->mgFfl;
    }

    public function setMgFfl(bool $mgFfl): void
    {
        $this->mgFfl = $mgFfl;
    }

    public function isMgFlag(): bool
    {
        return $this->mgFlag;
    }

    public function setMgFlag(bool $mgFlag): void
    {
        $this->mgFlag = $mgFlag;
    }

    public function getSupp(): string
    {
        return $this->supp;
    }

    public function setSupp(string $supp): void
    {
        $this->supp = $supp;
    }

    public function isSuppFfl(): bool
    {
        return $this->suppFfl;
    }

    public function setSuppFfl(bool $suppFfl): void
    {
        $this->suppFfl = $suppFfl;
    }

    public function isSuppFlag(): bool
    {
        return $this->suppFlag;
    }

    public function setSuppFlag(bool $suppFlag): void
    {
        $this->suppFlag = $suppFlag;
    }

    public function getSbr(): string
    {
        return $this->sbr;
    }

    public function setSbr(string $sbr): void
    {
        $this->sbr = $sbr;
    }

    public function isSbrFfl(): bool
    {
        return $this->sbrFfl;
    }

    public function setSbrFfl(bool $sbrFfl): void
    {
        $this->sbrFfl = $sbrFfl;
    }

    public function isSbrFlag(): bool
    {
        return $this->sbrFlag;
    }

    public function setSbrFlag(bool $sbrFlag): void
    {
        $this->sbrFlag = $sbrFlag;
    }

    public function getSbs(): string
    {
        return $this->sbs;
    }

    public function setSbs(string $sbs): void
    {
        $this->sbs = $sbs;
    }

    public function isSbsFfl(): bool
    {
        return $this->sbsFfl;
    }

    public function setSbsFfl(bool $sbsFfl): void
    {
        $this->sbsFfl = $sbsFfl;
    }

    public function isSbsFlag(): bool
    {
        return $this->sbsFlag;
    }

    public function setSbsFlag(bool $sbsFlag): void
    {
        $this->sbsFlag = $sbsFlag;
    }

    public function getAow(): string
    {
        return $this->aow;
    }

    public function setAow(string $aow): void
    {
        $this->aow = $aow;
    }

    public function isAowFfl(): bool
    {
        return $this->aowFfl;
    }

    public function setAowFfl(bool $aowFfl): void
    {
        $this->aowFfl = $aowFfl;
    }

    public function isAowFlag(): bool
    {
        return $this->aowFlag;
    }

    public function setAowFlag(bool $aowFlag): void
    {
        $this->aowFlag = $aowFlag;
    }

    public function getDd(): string
    {
        return $this->dd;
    }

    public function setDd(string $dd): void
    {
        $this->dd = $dd;
    }

    public function isDdFfl(): bool
    {
        return $this->ddFfl;
    }

    public function setDdFfl(bool $ddFfl): void
    {
        $this->ddFfl = $ddFfl;
    }

    public function isDdFlag(): bool
    {
        return $this->ddFlag;
    }

    public function setDdFlag(bool $ddFlag): void
    {
        $this->ddFlag = $ddFlag;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }

    public function getIsState(): ?string
    {
        return $this->isState;
    }

    public function setIsState(?string $isState): void
    {
        $this->isState = $isState;
    }

    public function getIsLower48(): ?string
    {
        return $this->isLower48;
    }

    public function setIsLower48(?string $isLower48): void
    {
        $this->isLower48 = $isLower48;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(?int $population): void
    {
        $this->population = $population;
    }

    public function getArea(): ?float
    {
        return $this->area;
    }

    public function setArea(?float $area): void
    {
        $this->area = $area;
    }

}