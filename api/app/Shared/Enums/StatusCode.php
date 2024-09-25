<?php declare(strict_types=1);

namespace Platform\Shared\Enums;

enum StatusCode: int
{
    case CREATED = 201;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case REDIRECT = 301;
    case SERVER_ERROR = 500;
    case SUCCESS = 200;
    case UNAUTHORIZED = 401;
}
