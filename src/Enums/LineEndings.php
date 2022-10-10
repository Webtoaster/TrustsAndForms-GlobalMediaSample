<?php
declare(strict_types=1);

namespace App\Enums;

enum LineEndings: string
{
    case HTML = '<br/>';
    case PDF = '\l\r';
    case SINGLE_LINE = ', ';
    case NONE = '';
}



