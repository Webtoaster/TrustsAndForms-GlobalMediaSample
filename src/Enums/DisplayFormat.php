<?php

declare(strict_types=1);

namespace App\Enums;

enum DisplayFormat: string
{
    case SINGLE_LINE = 'single';
    case MULTI_LINE = 'multi';
}

