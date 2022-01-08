<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class AppException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report(\Throwable $e)
    {
        Log::debug("Error! - Detalles: " . $e->getMessage());
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $errorHandler = new \App\Http\Tools\Handler();
        $errorHandler->error($this->getMessage());

        return response()->view(
            'errors.error',
            array(
                'exception' => $this
            )
        );
    }
}
