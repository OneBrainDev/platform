<?php declare(strict_types=1);

namespace Platform\Base;

use Illuminate\Http\JsonResponse;
use Platform\Shared\Enums\StatusCode;
use Platform\Shared\Enums\ResponseStatus;

abstract class BaseResponse extends JsonResponse
{
    public static function error(
        ResponseStatus $status = ResponseStatus::ERROR,
        StatusCode $code = StatusCode::SERVER_ERROR,
        array $payload = []
    ): JsonResponse {
        return self::buildResponse(
            status: $status,
            code: $code,
            data: $payload,
        );
    }

    public static function success(
        ResponseStatus $status = ResponseStatus::SUCCESS,
        StatusCode $code = StatusCode::SUCCESS,
        array $payload = []
    ): JsonResponse {
        return self::buildResponse(
            status: $status,
            code: $code,
            data: $payload,
        );
    }

    private static function buildResponse(ResponseStatus $status, StatusCode $code, array $data = [])
    {
        return response()->json([
          'status' => $status->value,
          'status_code' => $code->value,
          'data' => count($data) > 0
            ? $data
            : null,
        ]);
    }
}
