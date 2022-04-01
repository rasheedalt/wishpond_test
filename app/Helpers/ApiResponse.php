<?php

namespace App\Helpers;

use App\Models\ApiLog;
use App\Models\TransactionNotificationLog;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ApiResponse
{

    const VALID_RESPONSE = 200;
    const BAD_REQUEST_ERR_CODE = 400;
    const UNAUTHORIZED_ERR_CODE = 401;
    const FORBIDDEN_ERR_CODE = 403;
    const NOT_FOUND_ERR_CODE = 404; // Resource or page not found
    const SERVER_ERR_CODE = 500;

    /**
     * @param string|null $message
     * @param int|null $status_code
     * @param Request|null $request
     * @param \Exception|null $trace
     * @return \Illuminate\Http\JsonResponse
     */
    static function errorResponse($message = null, $status_code = null, Request $request = null, \Exception $trace = null)
    {
        $code = ($status_code != null) ? $status_code : "404";
        $body = [
            'message' => "$message",
            'code' => $code,
            'status_code' => $code,
            'status' => false
        ];

        return response()->json($body)->setStatusCode($code);
    }

    /**
     * @param string|null $message
     * @param array $data
     * @param Request|null $request
     * @param boolean|string|null $status
     * @param integer $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    static function validResponse($message = null, $data = [], Request $request = null, $status = true, $statusCode = 200)
    {
        $body = [
            'message' => "$message",
            'data' => $data,
            'status' => $status,
            'status_code' => $statusCode,
        ];

        return response()->json($body);
    }


}
