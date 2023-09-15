<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class ImageServiceException
 *
 * @package App\Exceptions
 */
final class ImageServiceException extends Exception
{
    public readonly string $methodName;

    /**
     * @param string $methodName
     * @param string $message
     * @param int $statusCode
     */
    public function __construct(string $methodName = '', string $message = '', int $statusCode = 404)
    {
        $this->methodName = $methodName;
        $this->message = $message;

        $errorMsg = "ImageService Method: {$this->methodName} Message: {$this->message}";
        parent::__construct($errorMsg, $statusCode);
    }

    /**
     * @return void
     */
    public function report(): void
    {
        Log::error($this->message);
    }
}
