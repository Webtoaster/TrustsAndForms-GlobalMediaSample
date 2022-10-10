<?php

namespace App\Service;

use App\Enums\DisplayFormat;
use App\Enums\LineEndings;

class Normalize
{
    public const DBA = ' d.b.a. ';

    private ?string $license_name = null;
    private ?string $business_name = null;
    private ?string $company_name = null;
    private ?string $human_name = null;
    private ?string $line1 = null;
    private ?string $line2 = null;
    private ?string $city = null;
    private ?string $state = null;
    private ?string $zip = null;
    private ?string $first = null;
    private ?string $middle = null;
    private ?string $last = null;
    private ?string $suffix = null;
    private string $line_ending;
    private string $format;


    private string $output = '';
    private string $address = '';

    /**
     * @param LineEndings $line_end
     */
    public function __construct(LineEndings $line_end)
    {
        $this->line_ending = $line_end->value;
        // $this->format = $displayFormat->value;
    }




    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        $this->makeCompanyName();
        $this->makeFFLName();
        $this->add($this->company_name);

        $this->makeHumanName();
        $this->add($this->human_name);

        $this->makeAddress();
        $this->add($this->address);

        return $this->output;
    }

    /** @noinspection PhpReturnValueOfMethodIsNeverUsedInspection */
    private function makeCompanyName(): ?string
    {
        $this->company_name .= $this->line_ending;

        return $this->company_name;
    }

    /** @noinspection PhpReturnValueOfMethodIsNeverUsedInspection */
    private function makeFFLName(): ?string
    {
        $name = $this->clean($this->license_name);

        if (!empty($this->business_name)) {
            $name .= $this->line_ending.self::DBA.$this->clean($this->business_name);
        } else {
            $name .= $this->line_ending;
        }
        $this->company_name = $name;

        return $this->company_name;
    }

    private function clean(string $string): string
    {
        $string = trim($string);

        return preg_replace('/(\s\s+|\t|\n)/', ' ', $string);
    }

    private function add(?string $string): void
    {
        $this->output .= $string;
    }

    public function makeHumanName(): ?string
    {
        $name = trim($this->first.' '.$this->middle.' '.$this->last.' '.$this->suffix.' ');
        $this->human_name = $this->clean($name);

        return $this->human_name;
    }

    /** @noinspection PhpReturnValueOfMethodIsNeverUsedInspection */
    private function makeAddress(): ?string
    {
        if (trim($this->line1) !== '') {
            $this->line1 = $this->clean($this->line1).$this->line_ending;
        }
        if (trim($this->line2) !== '') {
            $this->line2 = $this->clean($this->line2).$this->line_ending;
        }
        $cityStateZip = $this->clean($this->city.', '.$this->state.' '.$this->zip);

        $this->address = $this->line1.$this->line2.$cityStateZip;
        return $this->address;
    }

    /**
     * @param string|null $license_name
     */
    public function setLicenseName(?string $license_name): void
    {
        $this->license_name = trim($license_name);
    }

    /**
     * @param string|null $business_name
     */
    public function setBusinessName(?string $business_name): void
    {
        $this->business_name = trim($business_name);
    }

    /**
     * @param string|null $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = trim($company_name);
    }

    /**
     * @param string|null $line1
     */
    public function setLine1(?string $line1): void
    {
        $this->line1 = trim($line1);
    }

    /**
     * @param string|null trim($line2
     */
    public function setLine2(?string $line2): void
    {
        $this->line2 = trim($line2);
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = trim($city);
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = trim($state);
    }

    /**
     * @param string|null $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = trim($zip);
    }

    /**
     * @param string|null $first
     */
    public function setFirst(?string $first): void
    {
        $this->first = $first;
    }

    /**
     * @param string|null $middle
     */
    public function setMiddle(?string $middle): void
    {
        $this->middle = $middle;
    }

    /**
     * @param string|null $last
     */
    public function setLast(?string $last): void
    {
        $this->last = $last;
    }

    /**
     * @param string|null $suffix
     */
    public function setSuffix(?string $suffix): void
    {
        $this->suffix = $suffix;
    }

    /**
     * @return string
     * @deprecated
     */
    public function getOneLineFFLName(): string
    {
        $this->company_name = $this->clean($this->license_name).self::DBA.$this->clean($this->business_name);

        return $this->company_name;
    }

    /**
     * @return string
     * @deprecated
     */
    public function getTwoLineFFLName(): string
    {
        $this->company_name = $this->clean($this->license_name).$this->line_ending.self::DBA.$this->clean($this->business_name);

        return $this->company_name;
    }

    /**
     * @param string $line_ending
     * @return void
     */
    private function setLineEnding(string $line_ending): void
    {
        $this->line_ending = $line_ending;
    }

    /**
     * Normalizes Zip Code strings.
     *
     * @param ?string $zipcode
     *
     * @return ?string
     */
    private function normalizeZipCode(?string $zipcode): ?string
    {
        $zipcode = trim($zipcode);

        if (strlen($zipcode) === 10 || strlen($zipcode) === 5) {
            return $zipcode;
        }

        if (strlen($zipcode) === 9) {
            $zipcode = substr($zipcode, 0, 5).'-'.substr($zipcode, -4, 4);
        }

        return $zipcode;
    }


}