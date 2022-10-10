<?php

namespace App\Service;

class NormalizeStrings
{

    public static function normalizePhoneNumber(?string $phone): ?string
    {
        $phone = trim($phone);

        if (empty($phone)) {
            return $phone;
        }

        $phone = trim($phone);
        $phone = preg_replace("/\D/", "", $phone);
        $phone = substr($phone, -1, 10);

        return substr($phone, 0, 3).'-'.substr($phone, 3, 3).'-'.substr(
                $phone,
                6,
                4
            );
    }

    /**
     * Normalizes Zip Code strings.
     */
    public function normalizeZipCode(?string $zipcode): ?string
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