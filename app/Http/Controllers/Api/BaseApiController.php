<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseApiController extends Controller
{

    public function sendResponse($data = [], string $message = null, int $code = Response::HTTP_OK): JsonResponse
    {
        if ($message == null) {
            $message = __("Data retrieved successfully");
        }

        return response()->json([
            'success' => true,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public function sendResponseWithPagination($data, $pagination, $message = null, $code = Response::HTTP_OK): JsonResponse
    {
        if ($message == null) {
            $message = __("Data retrieved successfully");
        }

        return response()->json([
            'success' => true,
            'code' => $code,
            'message' => $message,
            'data' => $data,
            "pagination" => $pagination
        ], $code);
    }

}
