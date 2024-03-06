<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $statusCode = 200;
    protected $message = '';
    protected $error = false;
    protected $debugInfo = '';

    const DEFAULT_HEADERS = [
        "Access-Control-Allow-Credentials" => true,
        "Access-Control-Allow-Origin" => "*",
        "Access-Control-Allow-Methods" => "GET,HEAD,OPTIONS,POST,PUT,DELETE",
        "Access-Control-Allow-Headers" => "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers"
    ];

    /**
     * Function to return a success response.
     *
     * @param string $message
     * @param array $data
     * @param array $headers
     * @param LengthAwarePaginator|array $pagination
     * @return array
     */
    public function respondWithSuccess(string $message = '', array $data = [], array $headers = self::DEFAULT_HEADERS, array $pagination = []): array
    {
        return [
            'response' => [
                'status' => 200,
                'message' => $message ?? 'successfully return information',
                'error' => false
            ],
            'data' => empty($data) ? null : $data
        ];
    }

    /**
     * Function to return a error response.
     *
     * @param string $message
     * @param array $data
     * @param array $headers
     * @param LengthAwarePaginator|array $pagination
     * @return array
     */
    public function respondWithError(string $message = '', array $data = [], array $headers = self::DEFAULT_HEADERS, array $pagination = []): array
    {
        return [
            'response' => [
                'status' => 401,
                'message' => $message ?? 'Unauthorized!',
                'error' => true
            ],
            'data' => empty($data) ? null : $data
        ];
    }
}
