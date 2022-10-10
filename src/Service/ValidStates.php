<?php

namespace App\Service;

use App\Repository\MatrixRepository;


class ValidStates
{
    private MatrixRepository $matrix;

    public function __construct(MatrixRepository $matrix)
    {
        $this->matrix = $matrix;
    }

    public function getAllowableStates(): array
    {
        return $this->matrix->getAllowableStates();
    }





}