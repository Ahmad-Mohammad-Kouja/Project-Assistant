<?php


namespace Kouja\ProjectAssistant\Exceptions;

use Exception;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use Throwable;

class CreatingModelFailException extends Exception
{
    public function report()
    {
        return false;
    }


    public function render($request)
    {
        if($request->expectsJson())
        return ResponseHelper::creatingFail($this->message);

        abort(500);
    }
}