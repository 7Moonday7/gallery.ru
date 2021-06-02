<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Базовый API контроллер
 *
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * Собирает положительный json ответ
     *
     * @param array $data
     * @param int $httpCode
     * @param array $headers
     * @return JsonResponse
     */
    protected function responseSuccess(array $data, int $httpCode, array $headers = []) : JsonResponse
    {
        return response()->json(['status' => 'ok', 'data' => $data], $httpCode, $headers);
    }

    /**
     * Собирает отрицательный json ответ
     *
     * @param string $message
     * @param int $httpCode
     * @param array $headers
     * @return JsonResponse
     */
    protected function responseError(string $message, int $httpCode, array $headers = []) : JsonResponse
    {
        return response()->json(['status' => 'error', 'message' => $message], $httpCode, $headers);
    }
}
