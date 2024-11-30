<?php declare(strict_types=1);

namespace Platform\Shared\Enums;

enum ResponseStatus: string
{
    case ERROR = 'error';
    case FAIL = 'fail';
    case SUCCESS = 'success';
}
