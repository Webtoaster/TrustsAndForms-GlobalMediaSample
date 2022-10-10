<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait PhoneAlternateTrait
{
    /**
     * @Assert\NotBlank(
     *     groups={"phone_required", "phone_mobile_required", "phone_fax_required", "phone_work_required", "phone_home_required"},
     *     message="Phone Number cannot be Blank. (###-###-####)"
     * )
     * @Assert\Length(
     *     groups={"phone_required", "phone_mobile_required", "phone_fax_required", "phone_work_required", "phone_home_required"},
     *     min = 10,
     *     max = 14,
     *     minMessage = "Phone Number can be numeric only or with hyphens. (###-###-####)",
     *     maxMessage = "Phone Number can be numeric only or with hyphens. (###-###-####)"
     * )
     * @Assert\Regex(
     *     groups={
     *     "phone_all",
     *     "phone_required",
     *     "phone_mobile_required",
     *     "phone_fax_required",
     *     "phone_work_required",
     *     "phone_home_required"},
     *     pattern="/\d{3}([ .-])?\d{3}([ .-])?\d{4}|\(\d{3}\)([ ])?\d{3}([.-])?\d{4}|\(\d{3}\)([ ])?\d{3}([ ])?\d{4}|\(\d{3}\)([.-])?\d{3}([.-])?\d{4}|\d{3}([ ])?\d{3}([ .-])?\d{4}/s",
     *     match="true",
     *     message="Please enter a Mobile Phone Number.  i.e. 713-555-1212"
     * )
     * @ORM\Column(
     *     name="phone_alternate",
     *     type="string",
     *     length=14,
     *     nullable=true,
     *     options={"fixed"=true,  "comment"="Telephone number"}
     *     )
     */
    private ?string $phoneAlternate = null;

    public function getPhoneAlternate(): ?string
    {
        return $this->phoneAlternate;
    }

    public function setPhoneAlternate(?string $phoneAlternate): void
    {
        $this->phoneMain = preg_replace('/\D/', '', $phoneAlternate);
    }

}